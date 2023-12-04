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
@if($formObat)
  <div class="d-flex justify-content-start mb-4 mt-4">
    <button wire:click.prevent="create" class="btn btn-success btn-md rounded-7">+ Tambah Obat</button>
                </div>
    <table class="table rounded-4 text-center table-striped">
    <h2 class="text-center font-weight-bold dark-grey-text mb-4">Daftar Obat</h2>
  <thead style="background-color:#a1a1a1;">
    <tr class="text-white">
      <th scope="col">Nama obat</th>
      <th scope="col">Jenis obat</th>
      <th scope="col">Harga</th>
      <th scope="col">Supplier</th>
      <th scope="col">Edit</th>
      <th scope="col">Hapus</th>
    </tr>
  </thead>
  <tbody>
    @if(count($obat) == null)
    <tr>
      <th scope="row" colspan="6" class="text-center">Data kosong</th>
    </tr>
    @else
    @foreach($obat as $item)
    <tr>
        <th scope="row" class="text-capitalize">{{$item->nama_obat}}</th>
        <th scope="row" class="text-capitalize">{{$item->jenis_obat}}</th>
        <th scope="row" class="text-capitalize">@currency($item->harga_obat)</th>
        <th scope="row" class="text-capitalize">{{$item->supplier}}</th>
        <th scope="row" class="text-capitalize"><button type="button" wire:click.prevent="mountEdit({{$item->id}})" class="btn btn-md btn-info rounded-7" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#edit"><i class="far fa-edit"></i> Edit</button></th>
        <th scope="row" class="text-capitalize"><button type="button" wire:click.prevent="mountDelete({{$item->id}})" class="btn btn-md btn-danger rounded-7" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#hapus"><i class="fa-solid fa-trash"></i> Hapus</button></th>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
{{ $obat->links('pagination::bootstrap-5') }}
@else
<div class="col-md-6 mt-4 mb-5">
      <div class="card">
        <div class="card-header bg-success text-white">
          <h3 class="text-center font-weight-bold dark-grey-text">Tambah Obat</h3>
        </div>
        <div class="card-body">
          <form>
          <div class="form-group">
              <label for="password">Nama Obat</label>
              <input type="text" wire:model="namaObat" class="form-control" id="namaObat" placeholder="Isikan nama obat" required>
              @error('namaObat') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group mt-3">
              <label for="password">Jenis Obat</label>
              <input type="text" wire:model="jenisObat" class="form-control" id="jenisObat" placeholder="Isikan jenis obat" required>
              @error('jenisObat') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group mt-3">
              <label for="password">Harga Obat</label>
              <input type="number" min="0" wire:model="hargaObat" class="form-control" id="hargaObat" placeholder="Isikan harga obat" required>
              @error('hargaObat') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group mt-3">
              <label for="password">Supplier</label>
              <input type="text" wire:model="supplier" class="form-control" id="supplier" placeholder="Isikan supplier" required>
              @error('supplier') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>

            <button wire:click.prevent="tambahObat" class="mt-5 rounded-7 btn btn-primary">
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
        <h5 class="modal-title" id="staticBackdropLabel">Hapus obat?</h5>
        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
      <input type="hidden" wire:model="idObat">
      Apakah anda yakin ingin menghapus obat?
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
        <h5 class="modal-title" id="staticBackdropLabel">Edit Obat</h5>
        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
      <input type="hidden" wire:model="idObat">
      <div class="form-group">
              <label for="password">Nama Obat</label>
              <input type="text" wire:model="namaObat" class="form-control" id="namaObat" placeholder="Isikan nama obat" required>
              @error('namaObat') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group mt-3">
              <label for="password">Jenis Obat</label>
              <input type="text" wire:model="jenisObat" class="form-control" id="jenisObat" placeholder="Isikan jenis obat" required>
              @error('jenisObat') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group mt-3">
              <label for="password">Harga Obat</label>
              <input type="number" min="0" wire:model="hargaObat" class="form-control" id="hargaObat" placeholder="Isikan harga obat" required>
              @error('hargaObat') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group mt-3">
              <label for="password">Supplier</label>
              <input type="text" wire:model="supplier" class="form-control" id="supplier" placeholder="Isikan supplier" required>
              @error('supplier') <span class="text-danger error">{{ $message }}</span>@enderror
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
