<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model PerawatModel
use App\Models\PerawatModel;

class PerawatController extends Controller
{
    //method untuk tampil data pasien
    public function perawattampil()
    {
        $dataperawat = PerawatModel::orderby('nama_perawat', 'ASC')
        ->paginate(5);

        return view('halaman/view_perawat',['perawat'=>$dataperawat]);
    }

    //method untuk tambah data buku
    public function perawattambah(Request $request)
    {
        $this->validate($request, [
            'nama_perawat' => 'required',
            'nip_perawat' => 'required',
            'username' => 'required',
            'password' => 'required',
            'no_hp' => 'required'
        ]);

        PerawatModel::create([
            'nama_perawat' => $request->nama_perawat,
            'nip_perawat' => $request->nip_perawat,
            'username' => $request->username,
            'password' => $request->password,
            'no_hp' => $request->no_hp
        ]);

        return redirect('/perawat');
    }

     //method untuk hapus data buku
     public function perawathapus($id_perawat)
     {
         $dataperawat=PerawatModel::find($id_perawat);
         $dataperawat->delete();
 
         return redirect()->back();
     }

     //method untuk edit data buku
    public function perawatedit($id_perawat, Request $request)
    {
        $this->validate($request, [
            'nama_perawat' => 'required',
            'nip_perawat' => 'required',
            'username' => 'required',
            'password' => 'required',
            'no_hp' => 'required'
        ]);

        $id_perawat = PerawatModel::find($id_perawat);
        $id_perawat->nama_perawat   = $request->nama_perawat;
        $id_perawat->nip_perawat = $request->nip_perawat;
        $id_perawat->username  = $request->username;
        $id_perawat->password   = $request->password;
        $id_perawat->no_hp   = $request->no_hp;

        $id_perawat->save();

        return redirect()->back();
    }
}