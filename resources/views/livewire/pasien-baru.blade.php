<div>
<div class="container">
<div class="row">
        <div class="col-md-12">
        @if (session()->has('message'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
        <div class="alert alert-success">
        {{ session('message') }}
        </div>
        </div>
        @endif
        @if (session()->has('messageDelete'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
        <div class="alert alert-danger">
        {{ session('messageDelete') }}
        </div>
        </div>
        @endif
        </div>
    </div>
</div>

<div class="container">
<div class="row">
<div class="col-md-3">
<div class="input-group rounded">
<input wire:model.live="search" type="search" class="form-control rounded-7" placeholder="Cari nama pasien" aria-label="Search" aria-describedby="search-addon" />
<span class="input-group-text border-0" id="search-addon">
<i class="fas fa-search"></i>
</span>
</div>
</div>
<table class="table text-center table-striped mb-7">
    <h2 class="text-center font-weight-bold dark-grey-text mb-4">Pendaftaran Pasien</h2>
  <thead style="background-color:#a1a1a1;">
    <tr class="text-white">
      <th scope="col">Tanggal Periksa</th>
      <th scope="col">Nama Pasien</th>
      <th scope="col">Poli</th>
      <th scope="col">No Whatsapp</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @if(count($pasien) == null)
    <tr>
      <th scope="row" colspan="5" class="text-center">Data kosong</th>
    </tr>
    @endif
    @foreach($pasien as $item)
    <tr>
      <th scope="row">{{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('dddd, D MMM Y') }}</th>
      <th scope="row" class="text-capitalize">{{$item->name}}</th>
      <th scope="row">{{$item->poli}}</th>
      <th scope="row">{{$item->no_wa}}</th>
      <th scope="row"><div class="btn-group" role="group" aria-label="Basic example">
      <button type="button"
      wire:click="konfirm({{$item->id}})"
      wire:confirm="Konfirmasi pendaftaran?" class="konfirm btn btn-success" data-mdb-ripple-init><i class="fa-solid fa-check"></i> Konfirm</button>
      <button type="button"
      wire:click="tolak({{$item->id}})"
      wire:confirm="Tolak pendaftaran?"
       class="btn btn-danger" data-mdb-ripple-init><i class="fas fa-times"></i> Tolak</button>
    </div>
    </th>
    </tr>
    @endforeach
</tbody>
</table>
{{ $pasien->links('pagination::bootstrap-5') }}
</div>
</div>
</div>

