<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Dokter;
use App\Models\jadwalDokter;

class DokterAdmin extends Component
{
    public $formDokter = true;
    public $namaDokter;
    public $poli;
    public $dokter;
    public $idDokter;

    private function resetInputFields(){
        $this->namaDokter = '';
        $this->poli = '';
    }

    public function create(){
        $this->resetInputFields();
        $this->formDokter = !$this->formDokter;
    }

    public function mount(){
    $this->dokter = Dokter::get();
    }

    public function tambahDokter(){
        $validatedDate = $this->validate([
            'namaDokter' => 'required',
            'poli' => 'required',
        ]);

        $dokter=Dokter::create([
            'nama' => $this->namaDokter,
            'poli' => $this->poli
        ]);

        jadwalDokter::create([
            'id_dokter' => $dokter->id,
        ]);

        session()->flash('message', 'Dokter berhasil ditambahkan');
        $this->resetInputFields();
        $this->create();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.dokter-admin');
    }

    public function mountDelete($id){
        $dokter = Dokter::find($id);
        $this->idDokter = $dokter->id;
    }

    public function delete(){
        Dokter::where('id', $this->idDokter)->delete();

        session()->flash('messageDelete', 'Dokter berhasil dihapus');
        $this->mount();
        $this->resetInputFields();
    }

    public function mountEdit($id){
        $dokter = Dokter::find($id);
        $this->idDokter = $dokter->id;
        $this->namaDokter = $dokter->nama;
        $this->poli = $dokter->poli;
    }

    public function edit(){
        $validatedDate = $this->validate([
            'namaDokter' => 'required',
            'poli' => 'required',
        ]);

        Dokter::where('id', $this->idDokter)
        ->update([
            'nama' => $this->namaDokter,
            'poli' => $this->poli
        ]);
        session()->flash('messageEdit', 'Dokter berhasil diedit');
        $this->mount();
        $this->resetInputFields();
    }
}
