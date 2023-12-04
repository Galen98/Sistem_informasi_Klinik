<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\daftarPeriksa;

class FormDaftar extends Component
{
    public $formDaftar = false;
    public $periksa;
    public $tanggal;
    public $shift;
    public $poli;

    public function render()
    {
        return view('livewire.form-daftar');
    }

    public function mount(){
        $hariIni = now()->format('Y-m-d');
        $this->periksa = daftarPeriksa::where('id_user', auth()
        ->user()->id)->whereDate('tanggal', '>=', $hariIni)
        ->get();
    }

    public function daftar(){
        $this->formDaftar = !$this->formDaftar;
    }

    public function daftarPeriksa(){
        // $hariIni = now()->format('Y-m-d');
        // $nomorUrutTerakhir = daftarPeriksa::where('poli', $this->poli)
        // ->whereDate('created_at', $hariIni)
        // ->max('no_urut');

        // $nomorUrut = $nomorUrutTerakhir ? $nomorUrutTerakhir + 1 : 1;

        daftarPeriksa::create([
            'id_user' => auth()->user()->id,
            'tanggal' => $this->tanggal,
            'shift' => $this->shift,
            'poli' => $this->poli,
            'status' => 0,
        ]);
        session()->flash('message', 'Update Profil Berhasil');
        $this->daftar();
        $this->mount();
    }
}
