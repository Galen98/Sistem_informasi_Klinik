@extends('index')
@section('title', 'Janji')

@section('isihalaman')
    <h3><center>Daftar Obat</center></h3>
    
            <form>
                <label for="poli">Pilih Poliklinik</label>
                <select id="poli" name="poli">
                    <option>Konsultasi</option>
                    <option>Gigi</option>
                    <option>Khitan</option>
                </select>
                <p>
                <label for="tgljanji">Pilih Tanggal</label>

            </form>

    
    
@endsection