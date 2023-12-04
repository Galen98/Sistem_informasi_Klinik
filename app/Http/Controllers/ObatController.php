<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model ObatModel
use App\Models\ObatModel;

class ObatController extends Controller
{
    //method untuk tampil data obat
    public function obattampil()
    {
        $dataobat = ObatModel::orderby('nama_obat', 'ASC')
        ->paginate(5);

        return view('halaman/view_obat',['obat'=>$dataobat]);
    }

    //method untuk tambah data buku
    public function obattambah(Request $request)
    {
        $this->validate($request, [
            'nama_obat' => 'required',
            'jenis_obat' => 'required',
            'harga_obat' => 'required',
            'supplier' => 'required'
        ]);

        ObatModel::create([
            'nama_obat' => $request->nama_obat,
            'jenis_obat' => $request->jenis_obat,
            'harga_obat' => $request->harga_obat,
            'supplier' => $request->supplier
        ]);

        return redirect('/obat');
    }

     //method untuk hapus data buku
     public function obathapus($id_obat)
     {
         $dataobat=ObatModel::find($id_obat);
         $dataobat->delete();
 
         return redirect()->back();
     }

     //method untuk edit data buku
    public function obatedit($id_obat, Request $request)
    {
        $this->validate($request, [
            'nama_obat' => 'required',
            'jenis_obat' => 'required',
            'harga_obat' => 'required',
            'supplier' => 'required'
        ]);

        $id_obat = ObatModel::find($id_obat);
        $id_obat->nama_obat   = $request->nama_obat;
        $id_obat->jenis_obat  = $request->jenis_obat;
        $id_obat->harga_obat  = $request->harga_obat;
        $id_obat->supplier   = $request->supplier;

        $id_obat->save();

        return redirect()->back();
    }
}