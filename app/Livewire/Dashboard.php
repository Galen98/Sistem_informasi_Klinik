<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\daftarPeriksa;
use App\Models\Dokter;


class Dashboard extends Component
{
    public $jadwalDokteruser = false;
    public $daftarForm = false;
    public $daftarObat = false;
    public $formHistory = false;
    public $riwayatMedisUser = false;
    public $users;
    public $formPerawat = false;
    public $pasienBaru = false;
    public $periksa;
    public $obats;
    public $dokterJadwal = [];
    public $historyUser = [];

    public function lihatjadwaldokter(){
        $this->jadwalDokteruser = !$this->jadwalDokteruser;
        $this->dokterJadwal = Dokter::with('jadwalDokter')->get();
    }

    public function historyPasien(){
        $this->formHistory = !$this->formHistory;
    }

    public function createPerawat(){
        $this->formPerawat = !$this->formPerawat;
    }

    public function lihatRiwayat(){
        $this->riwayatMedisUser = !$this->riwayatMedisUser;
    }

    public function seeObat(){
        $this->daftarObat = !$this->daftarObat;
    }

    public function lihatBaru(){
        $this->pasienBaru = !$this->pasienBaru;
    }

    public function mount(){
        $hariIni = now()->format('Y-m-d');
        $this->users = User::where('isUser', true)
        ->where('id', auth()->user()->id)->first();
        $this->periksa = daftarPeriksa::where('status', 0)
        ->whereDate('tanggal', '>=', $hariIni)->count();
    }

    public function render()
    {
        $history = daftarPeriksa::with(['dokter', 'tambahObat.obat', 'pembayaran'])
        ->where('id_user', auth()->user()->id)->where('status',3)
        ->orderBy('tanggal','desc')->get();
        $hariIni = now()->format('Y-m-d');
        return view('livewire.dashboard',[
            'hariIni' => $hariIni,
            'history' => $history
        ]);
    }
}
