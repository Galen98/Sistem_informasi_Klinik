<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ObatModel;
use Livewire\WithPagination;

class ObatAdmin extends Component
{
    use WithPagination;
    public $formObat=true;
    public $namaObat;
    public $jenisObat;
    public $hargaObat;
    public $supplier;
    public $idObat;

    private function resetInputFields(){
        $this->namaObat = '';
        $this->jenisObat = '';
        $this->hargaObat = '';
        $this->supplier = '';
    }

    public function create(){
        $this->formObat = !$this->formObat;
    }

    public function render()
    {
        return view('livewire.obat-admin', [
            'obat' => ObatModel::paginate(5),
        ]);
    }

    public function tambahObat(){
        $validatedDate = $this->validate([
            'namaObat' => 'required',
            'jenisObat' => 'required',
            'hargaObat' => 'required',
        ]);

        ObatModel::create([
            'nama_obat' => $this->namaObat,
            'jenis_obat' => $this->jenisObat,
            'harga_obat' => $this->hargaObat,
            'supplier' => $this->supplier
        ]);

        session()->flash('message', 'Obat berhasil ditambahkan');

        $this->resetInputFields();
        $this->create();
    }

    public function mountDelete($id){
        $obat = ObatModel::find($id);
        $this->idObat = $obat->id;        
    }

    public function mountEdit($id){
        $obat = ObatModel::find($id);
        $this->idObat = $obat->id; 
        $this->namaObat = $obat->nama_obat;
        $this->jenisObat = $obat->jenis_obat;
        $this->hargaObat = $obat->harga_obat;
        $this->supplier = $obat->supplier;       
    }

    public function edit(){
        $validatedDate = $this->validate([
            'namaObat' => 'required',
            'jenisObat' => 'required',
            'hargaObat' => 'required',
        ]);

        ObatModel::where('id', $this->idObat)
        ->update([
            'nama_obat' => $this->namaObat,
            'jenis_obat' => $this->jenisObat,
            'harga_obat' => $this->hargaObat,
            'supplier' => $this->supplier,
        ]);

        session()->flash('messageEdit', 'Obat berhasil diedit');
        $this->resetInputFields();
    }

    public function delete(){
        ObatModel::where('id', $this->idObat)->delete();

        session()->flash('messageDelete', 'Obat berhasil dihapus');
        $this->resetInputFields();
    }
}
