<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\daftarPeriksa;
use Livewire\WithPagination;

class HistoryPasien extends Component
{
    use WithPagination;
    public $search;
    protected $queryString = ['search'];

    public function render()
    {
        return view('livewire.history-pasien',[
            'pasien' => daftarPeriksa::where('status',3)->leftJoin('users', 'daftar_periksa.id_user', '=', 'users.id')
            ->leftJoin('dokter', 'daftar_periksa.id_dokter', '=', 'dokter.id')
            ->select('daftar_periksa.tanggal', 'dokter.nama','daftar_periksa.id', 'daftar_periksa.poli', 'daftar_periksa.status', 'daftar_periksa.no_urut',
             'users.name', 'users.no_wa')
             ->orderBy('daftar_periksa.tanggal','desc')->where('users.name', 'like', '%'.$this->search.'%')
            ->paginate(5),
        ]);
    }
}
