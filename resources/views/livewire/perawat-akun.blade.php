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

        @if (session()->has('messageEdit'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
        <div class="alert alert-info">
        {{ session('messageEdit') }}
        </div>
        </div>
        @endif
        </div>
    </div>
</div>
<div class="container">
  <div class="row justify-content-md-center">
    @if($formCreate)
    <div class="col-md-6 mb-5">
      <div class="card">
        <div class="card-header bg-success text-white">
          <h3 class="text-center font-weight-bold dark-grey-text">Tambah Perawat</h3>
        </div>
        <div class="card-body">
        <form>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nama (Sesuai KTP) :</label>
                        <input type="text" wire:model="name" class="form-control">
                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="form-group">
                        <label>Email :</label>
                        <input type="text" wire:model="email" class="form-control">
                        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="form-group">
                        <label>Password :</label>
                        <input type="password" id="password" wire:model="password" name="password" class="form-control">
                        @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <br>
                    <button class="btn text-white btn-primary rounded-9 text-capitalize" wire:click.prevent="registerStore">Submit</button>
                </div>
            </div>
        </form>
        </div>
    </div>
    <div class="d-flex justify-content-start mt-5 mb-5">
                    <a href="" wire:click.prevent="create">< Kembali</a>
                </div>
    </div>
    @elseif($formEdit)
    <div class="col-md-6 mb-5">
      <div class="card">
        <div class="card-header bg-success text-white">
          <h3 class="text-center font-weight-bold dark-grey-text">Edit Akun Perawat</h3>
        </div>
        <div class="card-body">
        <form>
        <input type="hidden" id="password" wire:model="userId" name="password" class="form-control">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nama (Sesuai KTP) :</label>
                        <input type="text" wire:model="name" class="form-control">
                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="form-group">
                        <label>Email :</label>
                        <input type="text" wire:model="email" class="form-control">
                        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="form-group">
                        <label>Password :</label>
                        <input type="text" id="password" wire:model="password" name="password" class="form-control">
                        @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <br>
                    <button class="btn text-white btn-primary rounded-9 text-capitalize" wire:click.prevent="editStore">Submit</button>
                </div>
            </div>
        </form>
        </div>
    </div>
    <div class="d-flex justify-content-start mt-5 mb-5">
                    <a href="" wire:click.prevent="backEdit">< Kembali</a>
                </div>
    </div>
    @else
    <div class="d-flex justify-content-start mb-4">
    <button wire:click.prevent="create" class="btn btn-success btn-md rounded-7">+ Tambah Akun Perawat</button>
    </div>

    <table class="table text-center table-striped">
    <h2 class="text-center font-weight-bold dark-grey-text mb-4">Daftar Akun Perawat</h2>
  <thead style="background-color:#a1a1a1;">
    <tr class="text-white">
      <th scope="col">Nama Perawat</th>
      <th scope="col">Email</th>
      <th scope="col">Edit</th>
      <th scope="col">Hapus</th>
    </tr>
  </thead>
  <tbody>
    @if(count($perawat) == null)
    <tr>
      <th scope="row" colspan="4" class="text-center">Data kosong</th>
    </tr>
    @else
    @foreach($perawat as $item)
    <tr>
      <th scope="row" class="text-center">{{$item->name}}</th>
      <th scope="row" class="text-center">{{$item->email}}</th>
      <th scope="row" class="text-capitalize"><button type="button" wire:click.prevent="edit({{$item->id}})" class="btn btn-md btn-info rounded-7"><i class="far fa-edit"></i> Edit</button></th>
      <th scope="row" class="text-capitalize"><button type="button"
    wire:click="delete({{$item->id}})"
    wire:confirm="Apakah yakin ingin menghapus?" class="btn btn-md btn-danger rounded-7"
    ><i class="fa-solid fa-trash"></i> Hapus</button></th>
    </tr>
    @endforeach
    @endif
</tbody>
</table>
{{ $perawat->links('pagination::bootstrap-5') }}
<div class="d-flex justify-content-start mt-4">
                    <a href="/dashboard">< Kembali</a>
                </div>
@endif
</div>
</div>
</div>
