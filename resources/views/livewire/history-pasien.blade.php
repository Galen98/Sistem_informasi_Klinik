<div>
<div class="col-md-3">
    <div class="input-group rounded">
  <input wire:model.live="search" type="search" class="form-control rounded-7" placeholder="Cari pengguna" aria-label="Search" aria-describedby="search-addon" />
  <span class="input-group-text border-0" id="search-addon">
    <i class="fas fa-search"></i>
  </span>
</div>
</div>
<table class="table text-center table-striped mb-5">
    <h2 class="text-center font-weight-bold dark-grey-text mb-4">History Pasien
    </h2>
  <thead class="bg-danger">
    <tr class="text-white">
      <th scope="col">Tanggal Periksa</th>
      <th scope="col">Nama Pasien</th>
      <th scope="col">No Whatsapp</th>
      <th scope="col">Dokter</th>
      <th scope="col">Poli</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  @foreach($pasien as $item)
    <tr>
      <th scope="col">{{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('dddd, D MMM Y') }}</th>
      <th scope="col" class="text-capitalize">{{$item->name}}</th>
      <th scope="col" class="text-capitalize">{{$item->no_wa}}</th>
      <th scope="col" class="text-capitalize">{{$item->nama}}</th>
      <th scope="col">{{$item->poli}}</th>
      <th scope="col"><span class="badge badge-pill badge-success">Selesai</span></th>
    </tr>
    @endforeach
</tbody>
</table>
{{ $pasien->links('pagination::bootstrap-5') }}
<div class="d-flex justify-content-start mt-4 mb-4">
                    <a href="/dashboard">< Kembali</a>
                </div>
</div>
