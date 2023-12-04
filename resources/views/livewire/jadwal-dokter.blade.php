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
<div class="container mt-5">
  <div class="row justify-content-md-center">
  <table class="table text-center table-striped">
    <h2 class="text-center font-weight-bold dark-grey-text mb-4">Jadwal Dokter
    <br>{{ \Carbon\Carbon::parse($hariIni)->isoFormat('dddd, D MMM Y') }}
    </h2>
  <thead class="bg-danger">
    <tr class="text-white">
      <th scope="col">Nama Dokter</th>
      <th scope="col">Poli</th>
      <th scope="col">Jadwal</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    @foreach($dokters as $item)
    <tr>
        <td scope="col" class="text-capitalize">{{$item->nama}}</td>
        <td scope="col" class="text-capitalize">{{$item->poli}}</td>
        <td scope="col">
        @foreach($item->jadwalDokter as $jadwal)
        {{ \Carbon\Carbon::parse($jadwal->jam1)->isoFormat('HH:mm') }} - {{ \Carbon\Carbon::parse($jadwal->jam2)->isoFormat('HH:mm') }}<br>
        @endforeach
        </td>
        <td scope="col">
        <button type="button" wire:click.prevent="mountEdit({{$item->id}})" class="btn btn-md btn-info rounded-7"
        data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#editdokter">
        <i class="far fa-edit"></i> Edit</button>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
</div>
</div>

<!-- modal edit jadwal -->
<div
  class="modal fade"
  id="editdokter"
  data-mdb-backdrop="static"
  data-mdb-keyboard="false"
  tabindex="-1"
  aria-labelledby="staticBackdropLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="staticBackdropLabel">Edit jadwal dokter</h5>
        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
      <input type="hidden" wire:model="idDokter">
      @foreach($dokters as $item)
      <div class="form-group mt-3">
        <input type="text" name="" id="" disabled class="form-control" value="{{$item->nama}}">
      </div>
      @endforeach
      <div class="form-group mt-3">
        <label class="mb-3">Jadwal dokter</label>
      <table>
          <tr>
            <td><input type="time" wire:model="jam1" class="form-control"></td>
            <td>-</td>
            <td><input type="time" wire:model="jam2" class="form-control"></td>
          </tr>
        </table>
        <br>
</div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
        <button type="button" wire:click.prevent="edit" class="btn btn-primary" data-mdb-ripple-init data-mdb-dismiss="modal">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
