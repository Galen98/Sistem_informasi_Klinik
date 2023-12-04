<div>
<div class="container">
        <div class="row mt-5">
        <div class="col-md-3">
    <div class="input-group rounded">
  <input wire:model.live="search" type="search" class="form-control rounded-7" placeholder="Cari pengguna" aria-label="Search" aria-describedby="search-addon" />
  <span class="input-group-text border-0" id="search-addon">
    <i class="fas fa-search"></i>
  </span>
</div>
</div>

    <table class="table rounded-4 text-center table-striped">
    <h2 class="text-center font-weight-bold dark-grey-text mb-4">Daftar Pasien</h2>
  <thead style="background-color:#a1a1a1;">
    <tr class="text-white">
      <th scope="col">Nama</th>
      <th scope="col">Umur</th>
      <th scope="col">Email</th>
      <th scope="col">Alamat</th>
      <th scope="col">No Whatsapp</th>
      <th scope="col">Riwayat periksa</th>
    </tr>
  </thead>
  <tbody>
  @if(count($pasien) == null)
    <tr>
      <th scope="row" colspan="6" class="text-center">Data kosong</th>
    </tr>
  @else
  @foreach($pasien as $item)
  <tr>
  <th scope="row" class="text-capitalize">{{$item->name}}</th>
  @if($item->umur == null)
  <th scope="row" class="text-capitalize">(belum diisi)</th>
  @else
  <th scope="row" class="text-capitalize">{{$item->umur}} Tahun</th>
  @endif
  <th scope="row">{{$item->email}}</th>
  @if($item->alamat == null)
  <th scope="row">-</th>
  @else
  <th scope="row" class="text-capitalize">{{$item->alamat}}</th>
  @endif
  @if($item->no_wa == null)
  <th scope="row" class="text-capitalize">(belum diisi)</th>
  @else
  <th scope="row" class="text-capitalize">{{$item->no_wa}}</th>
  @endif
  @if($item->no_wa == null)
  <th scope="row" class="text-capitalize">(belum diisi)</th>
  @else
  <th scope="row" class="text-capitalize">
  <button class="btn btn-md btn-primary rounded-7 text-capitalize" wire:click.prevent="mountRiwayat({{$item->id}})"
  data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#riwayat">
  Lihat riwayat</button>
  </th>
  </tr>
  @endif
  @endforeach
  @endif
</tbody>
</table>
{{ $pasien->links('pagination::bootstrap-5') }}
</div>
</div>

<!-- modal riwayat -->
<div
  class="modal fade"
  id="riwayat"
  data-mdb-backdrop="static"
  data-mdb-keyboard="false"
  tabindex="-1"
  aria-labelledby="staticBackdropLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="staticBackdropLabel">Riwayat periksa</h5>
        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
      <input type="hidden" wire:model="idPasien">
      <div class="form-group">
      <label>Nama Pasien:</label>
      <input type="text" name="" id="" wire:model="namaPasien" class="form-control" disabled>
      <table class="table rounded-4 text-center table-striped mt-3">
  <thead class="bg-light">
    <tr class="text-dark">
      <th scope="col">Tanggal periksa</th>
      <th scope="col">Poli</th>
      <th scope="col">Dokter</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <div>
    @foreach($history as $item)
    <tr>
      <th scope="col">{{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('dddd, D MMM Y') }}</th>
      <th scope="col">{{$item->poli}}</th>
      <th scope="col" class="text-capitalize">{{$item->nama}}</th>
      <th scope="col"><span class="badge badge-pill badge-success">Selesai</span></th>
    </tr>
    @endforeach
</div>
</tbody>
</table>
    </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
