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
        @if (session()->has('messageDelete'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="mt-5">
        <div class="alert alert-danger">
        {{ session('messageDelete') }}
        </div>
        </div>
        @endif

        @if (session()->has('messageEdit'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="mt-5">
        <div class="alert alert-info">
        {{ session('messageEdit') }}
        </div>
        </div>
        @endif
        </div>
    </div>
</div>
<div class="container mt-4">
  <div class="row justify-content-md-center">
    @if($formDokter)
  <div class="d-flex justify-content-start mb-4 mt-4">
    <button wire:click.prevent="create" class="btn btn-success btn-md rounded-7">+ Tambah Dokter</button>
                </div>
    <table class="table text-center table-striped">
    <h2 class="text-center font-weight-bold dark-grey-text mb-4">Daftar Dokter</h2>
  <thead style="background-color:#a1a1a1;">
    <tr class="text-white">
      <th scope="col">Nama Dokter</th>
      <th scope="col">Poli</th>
      <th scope="col">Edit</th>
      <th scope="col">Hapus</th>
    </tr>
  </thead>
  <tbody>
    @if(count($dokter) == null)
    <tr>
      <th scope="row" colspan="4" class="text-center">Data kosong</th>
    </tr>
    @else
    @foreach($dokter as $item)
    <tr>
    <th scope="row" class="text-capitalize">{{$item->nama}}</th>
    <th scope="row" class="text-capitalize">{{$item->poli}}</th>
    <th scope="row" class="text-capitalize"><button type="button" wire:click.prevent="mountEdit({{$item->id}})" class="btn btn-md btn-info rounded-7" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#edit"><i class="far fa-edit"></i> Edit</button></th>
        <th scope="row" class="text-capitalize"><button type="button" wire:click.prevent="mountDelete({{$item->id}})" class="btn btn-md btn-danger rounded-7" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#hapus"><i class="fa-solid fa-trash"></i> Hapus</button></th>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
@else
<div class="col-md-6 mt-4 mb-5">
      <div class="card">
        <div class="card-header bg-success text-white">
          <h3 class="text-center font-weight-bold dark-grey-text">Tambah Dokter</h3>
        </div>
        <div class="card-body">
          <form>
          <div class="form-group">
              <label for="password">Nama Dokter</label>
              <input type="text" wire:model="namaDokter" class="form-control" id="namaDokter" placeholder="Isikan nama Dokter" required>
              @error('namaDokter') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group mt-3">
              <label for="password">Poli</label>
              <select wire:model="poli" id="" class="form-control">
              <option>Silahkan pilih</option>
                <option value="Umum">Umum</option>
                <option value="Gigi">Gigi</option>
                <option value="Khitan">Khitan</option>
              </select>
              @error('poli') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>

            <button wire:click.prevent="tambahDokter" class="mt-5 rounded-7 btn btn-primary">
                Submit</button>

          <div class="d-flex justify-content-start mt-4">
                    <a href="" wire:click.prevent="create">< Kembali</a>
                </div>
</form>
</div>
</div>
</div>
@endif
<!-- modal delete -->
<div
  class="modal fade"
  id="hapus"
  data-mdb-backdrop="static"
  data-mdb-keyboard="false"
  tabindex="-1"
  aria-labelledby="staticBackdropLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="staticBackdropLabel">Hapus dokter?</h5>
        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
      <input type="hidden" wire:model="idDokter">
      Apakah anda yakin ingin menghapus dokter?
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
        <button type="button" wire:click.prevent="delete" class="btn btn-primary" data-mdb-ripple-init data-mdb-dismiss="modal">Hapus</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- modal edit -->
<div
  class="modal fade"
  id="edit"
  data-mdb-backdrop="static"
  data-mdb-keyboard="false"
  tabindex="-1"
  aria-labelledby="staticBackdropLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Dokter</h5>
        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
      <input type="hidden" wire:model="idDokter">
      <div class="form-group">
              <label for="password">Nama Dokter</label>
              <input type="text" wire:model="namaDokter" class="form-control" id="namaDokter" placeholder="Isikan nama Dokter" required>
              @error('namaDokter') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group mt-3">
              <label for="password">Poli</label>
              <select wire:model="poli" id="" class="form-control">
              <option>Silahkan pilih</option>
                <option value="Umum">Umum</option>
                <option value="Gigi">Gigi</option>
                <option value="Khitan">Khitan</option>
              </select>
              @error('poli') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
        <button type="button" wire:click.prevent="edit" class="btn btn-primary" data-mdb-ripple-init data-mdb-dismiss="modal">Edit</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
</div>
