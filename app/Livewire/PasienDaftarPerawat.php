<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\daftarPeriksa;
use App\Models\ObatModel;
use App\Models\Pembayaran;
use App\Models\tambahObat;
use App\Models\Dokter;
use App\Models\User;
use Illuminate\Http\Request;

class PasienDaftarPerawat extends Component
{
    public $daftarPasien=false;
    public $nama;
    public $obats;
    public $namaobat = [];
    public $dokters;
    public $poli;
    public $shift;
    public $keterangan;
    public $alamat;
    public $usia;
    public $idObat;
    public $no_wa;
    public $idPeriksa;
    public $hargaPeriksa;
    public $search;
    protected $queryString = ['search'];

    public $inputs = [];
    public $i = 1;

    public function add($i)
    {
        $this->inputs[] = ['namaobat' => null];
    }

    public function remove($key)
    {
        unset($this->inputs[$key]);
        $this->inputs = array_values($this->inputs); // Reindex the array
    }

    private function resetInputFields(){
        $this->nama = '';
        $this->poli = '';
        $this->alamat = '';
        $this->usia = '';
        $this->no_wa = '';
        $this->shift = '';
    }

    public function mountSuccess($id){
        $this->obat = ObatModel::get();
        $daftar = daftarPeriksa::where('id', $id)->first();
        $this->idPeriksa = $daftar->id;
        $this->poli = $daftar->poli;
    }

    public function create(){
        $this->daftarPasien = !$this->daftarPasien;
    }

    public function render()
    {
        $hariIni = now()->format('Y-m-d');
        return view('livewire.pasien-daftar-perawat',[
            'hariIni' => $hariIni,
            'pasien' => daftarPeriksa::where('status', 1)
            ->whereDate('tanggal', '>=', $hariIni)
            ->leftJoin('users', 'daftar_periksa.id_user', '=', 'users.id')
            ->select('daftar_periksa.tanggal', 'daftar_periksa.shift', 'daftar_periksa.id', 'daftar_periksa.poli', 'daftar_periksa.status', 'daftar_periksa.no_urut',
             'users.name', 'users.alamat','users.no_wa','users.umur','users.no_wa')
             ->where('users.name', 'like', '%'.$this->search.'%')
            ->get(),
            'dokter' => Dokter::all(),
            'obat' => ObatModel::all()
        ]);
    }

    public function storeSelesai(Request $request){
        $idObat = $this->namaobat;
       
        daftarPeriksa::where('id', $this->idPeriksa)
        ->update([
            'id_dokter' => $this->dokters,
            'keterangan' => $this->keterangan,
            'status' => 3
        ]);

        $totalHargaObat = 0;
        foreach ($idObat as $idObats) {
        $obat = ObatModel::find($idObats);
        if ($obat) {
            $totalHargaObat += $obat->harga_obat;
        }
    }

        Pembayaran::create([
            'id_daftar_periksa' => $this->idPeriksa,
            'harga_periksa' => $this->hargaPeriksa,
            'harga_obat' => $totalHargaObat
        ]);
        $idObatRecords = [];

        foreach($idObat as $idObats){
            tambahObat::create([
                'id_daftar_periksa' => $this->idPeriksa,
                'id_obat' => $idObats,
            ]);
            $idObatRecords[] = $idObats;
        }

        session()->flash('message', 'Jadwal periksa selesai, silahkan cek history pasien');
    }

    public function addPeriksa(){
        $users = User::create([
            'name' => $this->nama,
            'alamat' => $this->alamat,
            'no_wa' => $this->no_wa,
            'isAdmin' => false,
            'isPerawat' => false,
            'isUser' => true,
            'umur' => $this->usia
        ]);

        $hariIni = now()->format('Y-m-d');
        $nomorUrutTerakhir = daftarPeriksa::where('poli', $this->poli)
        ->whereDate('tanggal', $hariIni)
        ->max('no_urut');

        $nomorUrut = $nomorUrutTerakhir ? $nomorUrutTerakhir + 1 : 1;

        daftarPeriksa::create([
            'id_user' => $users->id,
            'shift' => $this->shift,
            'poli' => $this->poli,
            'status' => 1,
            'tanggal' => now()->format('Y-m-d'),
            'no_urut' => $nomorUrut
        ]);

        session()->flash('message', 'Jadwal periksa berhasil ditambahkan.');
    }
}
