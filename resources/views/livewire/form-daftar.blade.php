<div>
<div class="container">
<div class="row">
        <div class="col-md-12">
            @if (session()->has('message'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="mt-5">
        <div class="alert alert-success">
        {{ session('message') }}
        </div>
        </div>
        @endif
        </div>
    </div>
</div>
<div class="container mt-4">
  <div class="row justify-content-md-center">
    @if($formDaftar)
    <div class="col-md-6">
      <div class="card">
        <div class="card-header bg-primary text-white">
          <h3 class="text-center font-weight-bold dark-grey-text">Form Daftar Periksa</h3>
        </div>
        <div class="card-body">
          <form>
            <div class="form-group">
              <label for="firstName">Pilih Poli</label>
              <select wire:model="poli" id="" class="form-control">
              <option>Silahkan pilih</option>
                <option value="Umum">Poli Umum</option>
                <option value="Gigi">Poli Gigi</option>
                <option value="Khitan">Poli Khitan</option>
              </select>
            </div>
  
            <div class="form-group mt-3">
              <label for="password">Tanggal Periksa</label>
              <input type="date" wire:model="tanggal" class="form-control dates" id="date">
            </div>

            <div class="form-group mt-3">
              <label for="firstName">Pilih Jam</label>
              <select wire:model="shift" id="" class="form-control">
              <option>Silahkan pilih</option>
                <option value="Pagi 06.00-10.00">Pagi 06.00-10.00</option>
                <option value="Sore 17.00-20.30">Sore 17.00-20.30</option>
              </select>
            </div>

            <button wire:click.prevent="daftarPeriksa" class="mt-5 rounded-7 btn btn-primary">
                Daftar</button>

                <div class="d-flex justify-content-start mt-4">
                    <a href="" wire:click.prevent="daftar">< Kembali</a>
                </div>
          </form>
        </div>
      </div>
    </div>
    @else
    <div class="d-flex justify-content-start mb-4">
    @if(auth()->user()->no_wa == null && auth()->user()->alamat == null)
    <button id="profil" class="btn btn-success btn-md rounded-7">+ Daftar Periksa</button>
    @else
    <button wire:click.prevent="daftar" class="btn btn-success btn-md rounded-7">+ Daftar Periksa</button>
    @endif
                </div>
    <table class="table rounded-4 text-center table-striped">
    <h2 class="text-center font-weight-bold dark-grey-text mb-4">Data Pendaftaran Anda</h2>
  <thead class="bg-primary">
    <tr class="text-white">
      <th scope="col">Tanggal</th>
      <th scope="col">Waktu</th>
      <th scope="col">Poli</th>
      <th scope="col">Dokter</th>
      <th scope="col">Status</th>
      <th scope="col">No.Urut</th>
    </tr>
  </thead>
  <tbody>
    @if(count($periksa) == null)
    <tr>
      <th scope="row" colspan="6" class="text-center">Data kosong</th>
    </tr>
    @else
    @foreach($periksa as $item)
    <tr>
        <th scope="row">{{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('dddd, D MMM Y') }}</th>
        <th scope="row">{{$item->shift}}</th>
        <th scope="row">{{$item->poli}}</th>
        @if($item->id_dokter == null)
        <th scope="row">-</th>
        @endif
        @if($item->status == 0)
        <th scope="row"><span class="badge badge-info">Menunggu konfirmasi</span></th>
        @elseif($item->status == 1)
        <th scope="row"><span class="badge badge-success">Berhasil konfirmasi</span></th>
        @elseif($item->status == 2)
        <th scope="row"><span class="badge badge-danger">Ditolak</span></th>
        @elseif($item->status == 3)
        <th scope="row"><span class="badge badge-success">Selesai</span></th>
        @endif
        @if($item->no_urut == null)
        <th scope="row">-</th>
        @else
        <th scope="row">0{{$item->no_urut}}</th>
        @endif
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
    @endif
  </div>
</div>
</div>
