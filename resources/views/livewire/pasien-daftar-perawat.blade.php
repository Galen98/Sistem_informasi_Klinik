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
  <div class="row">
  <div class="d-flex justify-content-start mb-4 mt-4">
    <button class="btn btn-success btn-md rounded-7"
    data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#tambahpasien"
    >+ Tambah pasien</button>
    <a class="text-white">aa</a>
    <button class="btn btn-primary btn-md rounded-7"
    data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#daftarObat">Lihat daftar obat</button>
                </div>
<div class="col-md-3 mt-4">
<div class="input-group rounded">
<input wire:model.live="search" type="search" class="form-control rounded-7" placeholder="Cari nama pasien" aria-label="Search" aria-describedby="search-addon" />
<span class="input-group-text border-0" id="search-addon">
<i class="fas fa-search"></i>
</span>
</div>
</div>
    <table class="table text-center table-striped">
    <h2 class="text-center font-weight-bold dark-grey-text mb-4">Daftar Pasien Periksa
    <br>{{ \Carbon\Carbon::parse($hariIni)->isoFormat('dddd, D MMM Y') }}</h2>
  <thead class="bg-danger">
    <tr class="text-white">
      <th scope="col">Nama Pasien</th>
      <th scope="col">Usia</th>
      <th scope="col">Alamat</th>
      <th scope="col">No Whatsapp</th>
      <th scope="col">Poli</th>
      <th scope="col">Jam</th>
      <th scope="col">No Urut</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @if(count($pasien) == null)
    <tr>
    <th scope="row" colspan="8" class="text-center">Data kosong</th> 
    </tr>
    @else
    @foreach($pasien as $item)
    <th scope="row" class="text-center text-capitalize">{{$item->name}}</th> 
    <th scope="row" class="text-center text-capitalize">{{$item->umur}} Tahun</th> 
    <th scope="row" class="text-center text-capitalize">{{$item->alamat}}</th> 
    <th scope="row" class="text-center text-capitalize">{{$item->no_wa}}</th> 
    <th scope="row" class="text-center text-capitalize">{{$item->poli}}</th> 
    <th scope="row" class="text-center text-capitalize">{{$item->shift}}</th> 
    <th scope="row" class="text-center text-capitalize">0{{$item->no_urut}}</th>
    <th scope="row" class="text-center text-capitalize">
    <button type="button" wire:click.prevent="mountSuccess({{$item->id}})" class="btn btn-md btn-success rounded-7" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#selesai">
    <i class="fa-solid fa-check"></i> Selesai</button>
    </th> 
    @endforeach
    @endif

</tbody>
</table>
</div>
</div>

<!-- modal selesai -->
<div
  class="modal fade"
  id="selesai"
  data-mdb-backdrop="static"
  data-mdb-keyboard="false"
  tabindex="-1"
  aria-labelledby="staticBackdropLabel"
  aria-hidden="true"
  wire:ignore.self
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-secondary text-white">
        <h5 class="modal-title" id="staticBackdropLabel">Selesai periksa</h5>
        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
      <input type="hidden" wire:model="idPeriksa">
     
          <div class="form-group">
              <label for="firstName">Poli</label>
              <input type="text" class="form-control disabled" wire:model="poli" disabled>
            </div>

            <div class="form-group mt-3">
              <label for="firstName">Dokter</label>
              <select wire:model="dokters" id="" class="form-control">
              <option>Silahkan pilih</option>
              @foreach($dokter as $item)
              <option value="{{$item->id}}">{{$item->nama}} - {{$item->poli}}</option>
              @endforeach
              </select>
            </div>

            <div class="mt-3">
            <label for="firstName">Obat</label>
            <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                        <button class="btn text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">+ tambah obat</button>
                        </div>
                    </div>
                    <div class="col-md-2">
            </div>
            </div>
            </div>

            @foreach($inputs as $key => $value)
            <div class="mt-2 add-input">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                        <select wire:model="namaobat.{{$key}}" name="obat" id="" class="form-control">
                        <option>Silahkan pilih</option>
                        @foreach($obat as $item)
                        <option value="{{$item->id}}">{{$item->nama_obat}}</option>
                        @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">Remove</button>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="form-group mt-3">
        <label for="firstName">Biaya periksa</label>
        <input type="number" name="" wire:model="hargaPeriksa" id="" class="form-control" min="0">
        </div>

        <div class="form-group mt-3">
        <label for="firstName">Keterangan</label>
        <textarea name="" class="form-control" id="" cols="10" rows="3"></textarea>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
        <button type="button" wire:click.prevent="storeSelesai" class="btn btn-primary" data-mdb-ripple-init data-mdb-dismiss="modal">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- modal daftar obat -->
<div
  class="modal fade"
  id="daftarObat"
  data-mdb-backdrop="static"
  data-mdb-keyboard="false"
  tabindex="-1"
  aria-labelledby="staticBackdropLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="staticBackdropLabel">Daftar Obat</h5>
        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
        <form>
        <table class="table rounded-4 text-center table-striped">
    <h2 class="text-center font-weight-bold dark-grey-text mb-4">Daftar Obat</h2>
  <thead class="bg-light">
    <tr class="text-dark">
      <th scope="col">Nama obat</th>
      <th scope="col">Jenis obat</th>
      <th scope="col">Supplier</th>
      <th scope="col">Harga</th>
    </tr>
  </thead>
  <tbody>
    @if(count($obat) == null)
    <tr colspan="4">No data</tr>
    @else
    @foreach($obat as $item)
    <tr>
        <th scope="col" class="text-capitalize">{{$item->nama_obat}}</th>
        <th scope="col" class="text-capitalize">{{$item->jenis_obat}}</th>
        <th scope="col" class="text-capitalize">{{$item->supplier}}</th>
        <th scope="col" class="text-capitalize">@currency($item->harga_obat)</th>
    </tr>
    @endforeach
    @endif
</tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" 
        class="btn btn-light" 
        data-mdb-ripple-init 
        data-mdb-dismiss="modal">
          Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- modal tambah pasien -->
<div class="modal fade"
  id="tambahpasien"
  data-mdb-backdrop="static"
  data-mdb-keyboard="false"
  tabindex="-1"
  aria-labelledby="staticBackdropLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah jadwal periksa</h5>
        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
        <div class="form-group">
        <label for="firstName">Nama pasien</label>
        <input type="text" name="" wire:model="nama" id="" class="form-control">
        </div>

        <div class="form-group mt-3">
        <label for="firstName">Alamat</label>
        <input type="text" name="" wire:model="alamat" id="" class="form-control">
        </div>

        <div class="form-group mt-3">
        <label for="firstName">No Whatsapp</label>
        <input type="number" name="" wire:model="no_wa" id="" class="form-control">
        </div>

        <div class="form-group mt-3">
        <label for="firstName">Usia</label>
        <input type="number" name="" wire:model="usia" id="" class="form-control">
        </div>

        <div class="form-group mt-3">
              <label for="firstName">Pilih Poli</label>
              <select wire:model="poli" id="" class="form-control">
              <option>Silahkan pilih</option>
                <option value="Umum">Poli Umum</option>
                <option value="Gigi">Poli Gigi</option>
                <option value="Khitan">Poli Khitan</option>
              </select>
            </div>

            <div class="form-group mt-3">
              <label for="firstName">Pilih Jam</label>
              <select wire:model="shift" id="" class="form-control">
              <option>Silahkan pilih</option>
                <option value="Pagi 06.00-10.00">Pagi 06.00-10.00</option>
                <option value="Sore 17.00-20.30">Sore 17.00-20.30</option>
              </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
        <button type="button" wire:click.prevent="addPeriksa" class="btn btn-primary" data-mdb-ripple-init data-mdb-dismiss="modal">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>

