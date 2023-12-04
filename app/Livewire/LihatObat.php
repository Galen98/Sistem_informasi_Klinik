<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ObatModel;
class LihatObat extends Component
{
    public function render()
    {
        return view('livewire.lihat-obat',[
            'obats' => ObatModel::all(),
        ]);
    }
}
