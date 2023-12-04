<?php

namespace App\Livewire;

use App\Models\Dokter;
use App\Models\jadwalDokters;
use Livewire\Component;

class JadwalDokter extends Component
{
    public $idDokter;
    public $jam1;
    public $jam2;

    public function mountEdit($id){
        $dokter = Dokter::find($id);
        $jadwal = jadwalDokters::where('id_dokter', $id)->first();
        $this->jam1 = $jadwal->jam1;
        $this->jam2 = $jadwal->jam2;
        $this->idDokter = $dokter->id;
        $dokters = Dokter::where('id', $id)->with('jadwalDokter')->get();
    }

    public function edit(){
        jadwalDokters::where('id_dokter', $this->idDokter)
        ->update([
            'jam1' => $this->jam1,
            'jam2' => $this->jam2
        ]);
        session()->flash('message', 'Update jadwal dokter Berhasil');
    }

    public function render()
    {    
        $dokters = Dokter::with('jadwalDokter')->get();
        $hariIni = now()->format('Y-m-d');
        return view('livewire.jadwal-dokter',[
            'hariIni' => $hariIni,
            'dokters' => $dokters
        ]);
    }
}
