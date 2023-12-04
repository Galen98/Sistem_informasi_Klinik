<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model ObatModel
use App\Models\JanjiModel;

class JanjiController extends Controller
{
    //method untuk tampil data obat
    public function janjitampil()
    {
        

        return view('halaman/view_janji');
    }

    //method untuk tambah data buku
   
}