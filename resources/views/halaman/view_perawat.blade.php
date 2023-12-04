@extends('index')
@section('title', 'Perawat')

@section('isihalaman')
    <h3><center>Daftar Perawat</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPerawatTambah"> 
        Tambah Data Perawat
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Perawat</td>
                <td align="center">Nama Perawat</td>
                <td align="center">NIP Perawat</td>
                <td align="center">Username</td>
                <td align="center">Password</td>
                <td align="center">No HP</td>
                
            </tr>
        </thead>

        <tbody>
            @foreach ($perawat as $index=>$pr)
                <tr>
                    <td align="center" scope="row">{{ $index + $perawat->firstItem() }}</td>
                    <td>{{$pr->id_perawat}}</td>
                    <td>{{$pr->nama_perawat}}</td>
                    <td>{{$pr->nip_perawat}}</td>
                    <td>{{$pr->username}}</td>
                    <td>{{$pr->password}}</td>
                    <td>{{$pr->no_hp}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalPerawatEdit{{$pr->id_perawat}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data pasien -->
                        <div class="modal fade" id="modalPerawatEdit{{$pr->id_perawat}}" tabindex="-1" role="dialog" aria-labelledby="modalPerawatEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalPerawatEditLabel">Form Edit Data Perawat</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formperawatedit" id="formperawatedit" action="/perawat/edit/{{ $pr->id_perawat}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="nama_perawat" class="col-sm-4 col-form-label">Nama Perawat</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama_perawat" name="nama_perawat" placeholder="Masukan Nama Perawat">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="nip_perawat" class="col-sm-4 col-form-label">NIP Perawat</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nip_perawat" name="nip_perawat" value="{{ $pr->nip_perawat}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="username" class="col-sm-4 col-form-label">Username</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="username" name="username" value="{{ $pr->username}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="password" class="col-sm-4 col-form-label">Password</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="password" name="password" value="{{ $pr->password}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="no_hp" class="col-sm-4 col-form-label">No Hp</label>
                                                <div class="col-sm-8">
                                                    <input type="int" class="form-control" id="no_hp" name="no_hp" value="{{ $pr->no_hp}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="perawattambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data buku -->
                        |
                        <a href="perawat/hapus/{{$pr->id_perawat}}" onclick="return confirm('Yakin mau dihapus?')">
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
    Halaman : {{ $perawat->currentPage() }} <br />
    Jumlah Data : {{ $perawat->total() }} <br />
    Data Per Halaman : {{ $perawat->perPage() }} <br />

    {{ $perawat->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Buku -->
    <div class="modal fade" id="modalPerawatTambah" tabindex="-1" role="dialog" aria-labelledby="modalPerawatTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPerawatTambahLabel">Form Input Data Perawat</h5>
                </div>
                <div class="modal-body">
                    <form name="formperawattambah" id="formperawattambah" action="/perawat/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <p>
                        <div class="form-group row">
                            <label for="nama_perawat" class="col-sm-4 col-form-label">Nama Perawat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_perawat" name="nama_perawat" placeholder="Masukan Nama Perawat">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="nip_perawat" class="col-sm-4 col-form-label">NIP Pasien</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nip_perawat" name="nip_perawat" placeholder="Masukan NIP Perawat">
                            </div>
                        </div>

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
                            <label for="no_hp" class="col-sm-4 col-form-label">No HP</label>
                            <div class="col-sm-8">
                                <input type="int" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan No HP">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="perawattambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data buku -->
    
@endsection