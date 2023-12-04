<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model PasienModel
use App\Models\PasienModel;

class PasienController extends Controller
{
    //method untuk tampil data pasien
    public function pasientampil()
    {
        $datapasien = PasienModel::orderby('nama', 'ASC')
        ->paginate(5);

        return view('halaman/view_pasien',['pasien'=>$datapasien]);
    }

    //method untuk tambah data buku
    public function pasientambah(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);

        PasienModel::create([
            'username' => $request->username,
            'password' => $request->password,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);

        return redirect('/pasien');
    }

     //method untuk hapus data buku
     public function pasienhapus($id_pasien)
     {
         $datapasien=PasienModel::find($id_pasien);
         $datapasien->delete();
 
         return redirect()->back();
     }

     //method untuk edit data buku
    public function pasienedit($id_pasien, Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);

        $id_pasien = PasienModel::find($id_pasien);
        $id_pasien->username   = $request->username;
        $id_pasien->password  = $request->password;
        $id_pasien->nama  = $request->nama;
        $id_pasien->alamat   = $request->alamat;
        $id_pasien->no_hp   = $request->no_hp;

        $id_pasien->save();

        return redirect()->back();
    }
}