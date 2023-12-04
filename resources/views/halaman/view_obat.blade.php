@extends('index')
@section('title', 'Obat')

@section('isihalaman')
    <h3><center>Daftar Obat</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalObatTambah"> 
        Tambah Data Obat 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Obat</td>
                <td align="center">Nama Obat</td>
                <td align="center">Jenis Obat</td>
                <td align="center">Harga Obat</td>
                <td align="center">Supplier</td>
                
            </tr>
        </thead>

        <tbody>
            @foreach ($obat as $index=>$ob)
                <tr>
                    <td align="center" scope="row">{{ $index + $obat->firstItem() }}</td>
                    <td>{{$ob->id_obat}}</td>
                    <td>{{$ob->nama_obat}}</td>
                    <td>{{$ob->jenis_obat}}</td>
                    <td>{{$ob->harga_obat}}</td>
                    <td>{{$ob->supplier}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalObatEdit{{$ob->id_obat}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data Buku -->
                        <div class="modal fade" id="modalObatEdit{{$ob->id_obat}}" tabindex="-1" role="dialog" aria-labelledby="modalObatEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalObatEditLabel">Form Edit Data Obat</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formobatedit" id="formobatedit" action="/obat/edit/{{ $ob->id_obat}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="nama_obat" class="col-sm-4 col-form-label">Nama Obat</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama_obat" name="nama_obat" placeholder="Masukan Nama Obat">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="jenis_obat" class="col-sm-4 col-form-label">Jenis Obat</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="jenis_obat" name="jenis_obat" value="{{ $ob->jenis_obat}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="harga_obat" class="col-sm-4 col-form-label">Harga Obat</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="harga_obat" name="harga_obat" value="{{ $ob->harga_obat}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="supplier" class="col-sm-4 col-form-label">Supplier</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="supplier" name="supplier" value="{{ $ob->supplier}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="obattambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data buku -->
                        |
                        <a href="obat/hapus/{{$ob->id_obat}}" onclick="return confirm('Yakin mau dihapus?')">
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
    Halaman : {{ $obat->currentPage() }} <br />
    Jumlah Data : {{ $obat->total() }} <br />
    Data Per Halaman : {{ $obat->perPage() }} <br />

    {{ $obat->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Buku -->
    <div class="modal fade" id="modalObatTambah" tabindex="-1" role="dialog" aria-labelledby="modalObatTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalObatTambahLabel">Form Input Data Obat</h5>
                </div>
                <div class="modal-body">
                    <form name="formobattambah" id="formobattambah" action="/obat/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="nama_obat" class="col-sm-4 col-form-label">Nama obat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_obat" name="nama_obat" placeholder="Masukan Nama obat">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="jenis_obat" class="col-sm-4 col-form-label">Jenis obat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="jenis_obat" name="jenis_obat" placeholder="Masukan Jenis Obat">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="harga_obat" class="col-sm-4 col-form-label">Harga obat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="harga_obat" name="harga_obat" placeholder="Masukan Harga obat">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="supplier" class="col-sm-4 col-form-label">Supplier</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="supplier" name="supplier" placeholder="Masukkan Supplier">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="obattambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data buku -->
    
@endsection