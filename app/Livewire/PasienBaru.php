<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\daftarPeriksa;


class PasienBaru extends Component
{

    public function konfirm($id){
        $terima = daftarPeriksa::find($id);
        $nomorUrutTerakhir = daftarPeriksa::where('poli', $terima->poli)
        ->whereDate('tanggal', $terima->tanggal)
        ->max('no_urut');

        $nomorUrut = $nomorUrutTerakhir ? $nomorUrutTerakhir + 1 : 1;
        daftarPeriksa::where('id', $id)
        ->update([
            'no_urut' => $nomorUrut,
            'status' => 1,
        ]);
        session()->flash('message', 'Pendaftaran berhasil dikonfirmasi');
    }

    public function render()
    {
        $hariIni = now()->format('Y-m-d');
        return view('livewire.pasien-baru',[
            'pasien' => daftarPeriksa::where('status', 0)
            ->whereDate('tanggal', '>=', $hariIni)->leftJoin('users', 'daftar_periksa.id_user', '=', 'users.id')
            ->select('daftar_periksa.tanggal', 'daftar_periksa.id', 'daftar_periksa.poli', 'daftar_periksa.status', 'daftar_periksa.no_urut',
             'users.name', 'users.no_wa')
            ->paginate(5),
        ]);
    }
}
