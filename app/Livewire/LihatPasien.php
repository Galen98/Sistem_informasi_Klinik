<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use App\Models\daftarPeriksa;

class LihatPasien extends Component
{
    use WithPagination;
    public $search;
    public $idPasien;
    public $namaPasien;
    public $history = [];
    public $poli;
    
 
    protected $queryString = ['search'];

    public function mountRiwayat($id){
        $pasien = User::find($id);
        $this->namaPasien = $pasien->name;
        $this->history = daftarPeriksa::where('id_user', $id)
        ->where('status', 3)
        ->leftjoin('dokter', 'daftar_periksa.id_dokter', '=', 'dokter.id')
        ->select('dokter.nama', 'daftar_periksa.tanggal', 'daftar_periksa.poli')->get();
    }
    
    public function render()
    {
        return view('livewire.lihat-pasien', [
            'pasien' => User::where('name', 'like', '%'.$this->search.'%')
            ->where('isUser', true)->paginate(5),
        ]);
    }
}
