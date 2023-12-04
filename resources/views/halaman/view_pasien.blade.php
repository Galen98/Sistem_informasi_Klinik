@extends('index')
@section('title', 'Pasien')

@section('isihalaman')
    <h3><center>Daftar Pasien</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPasienTambah"> 
        Tambah Data Pasien
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Pasien</td>
                <td align="center">Username</td>
                <td align="center">Password</td>
                <td align="center">Nama Pasien</td>
                <td align="center">Alamat</td>
                <td align="center">No HP</td>
                
            </tr>
        </thead>

        <tbody>
            @foreach ($pasien as $index=>$ps)
                <tr>
                    <td align="center" scope="row">{{ $index + $pasien->firstItem() }}</td>
                    <td>{{$ps->id_pasien}}</td>
                    <td>{{$ps->username}}</td>
                    <td>{{$ps->password}}</td>
                    <td>{{$ps->nama}}</td>
                    <td>{{$ps->alamat}}</td>
                    <td>{{$ps->no_hp}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalPasienEdit{{$ps->id_pasien}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data pasien -->
                        <div class="modal fade" id="modalPasienEdit{{$ps->id_pasien}}" tabindex="-1" role="dialog" aria-labelledby="modalPasienEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalPasienEditLabel">Form Edit Data Pasien</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formpasienedit" id="formpasienedit" action="/pasien/edit/{{ $ps->id_pasien}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="username" class="col-sm-4 col-form-label">Username</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="password" class="col-sm-4 col-form-label">Password</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="password" name="password" value="{{ $ps->password}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="nama" class="col-sm-4 col-form-label">Nama Pasien</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $ps->nama}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $ps->alamat}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="no_hp" class="col-sm-4 col-form-label">No Hp</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $ps->no_hp}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="pasientambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data buku -->
                        |
                        <a href="pasien/hapus/{{$ps->id_pasien}}" onclick="return confirm('Yakin mau dihapus?')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--awal pagination-->
    Halaman : {{ $pasien->currentPage() }} <br />
    Jumlah Data : {{ $pasien->total() }} <br />
    Data Per Halaman : {{ $pasien->perPage() }} <br />

    {{ $pasien->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Buku -->
    <div class="modal fade" id="modalPasienTambah" tabindex="-1" role="dialog" aria-labelledby="modalPasienTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPasienTambahLabel">Form Input Data Pasien</h5>
                </div>
                <div class="modal-body">
                    <form name="formpasientambah" id="formpasientambah" action="/pasien/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="username" class="col-sm-4 col-form-label">Username</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="password" name="password" placeholder="Masukan Password">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-4 col-form-label">Nama Pasien</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Pasien">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="no_hp" class="col-sm-4 col-form-label">No HP</label>
                            <div class="col-sm-8">
                                <input type="int" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan No HP">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="pasientambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data buku -->
    
@endsection