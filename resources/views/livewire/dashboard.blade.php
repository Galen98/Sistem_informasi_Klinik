<div>
<div class="container">
        <div class="row mt-5 justify-content-center">
        @if($jadwalDokteruser)
        <h3 class="text-capitalize">Jadwal dokter, {{ \Carbon\Carbon::parse($hariIni)->isoFormat('dddd, D MMM Y') }}</h3>
        @elseif($riwayatMedisUser)
        <h3 class="text-capitalize"></h3>
        @else
        <h3 class="text-capitalize">Selamat datang, {{auth()->user()->name}}</h3>
        @endif

    <div class="row mt-5">
      @if(auth()->user()->isUser == true)
      @if($jadwalDokteruser)
      @foreach($dokterJadwal as $item)
      <div class="col-md-3">
      <div class="card">
        <div class="card-body">
        <i class="fa-solid fa-user-doctor mb-3 text-primary" style="font-size:50px;"></i>
          <h5 class="card-title">{{$item->nama}}</h5>
          <p class="card-text">Poli {{$item->poli}}</p>
          <p class="card-text">Jadwal: 
          @foreach($item->jadwalDokter as $jadwal)
        {{ \Carbon\Carbon::parse($jadwal->jam1)->isoFormat('HH:mm') }} - {{ \Carbon\Carbon::parse($jadwal->jam2)->isoFormat('HH:mm') }}<br>
        @endforeach
          </p>
        </div>
      </div>
    </div>
    @endforeach
    <div class="d-flex justify-content-start mt-4">
                    <a href="/dashboard">< Kembali</a>
                </div>
    @elseif($riwayatMedisUser)
    <table class="table rounded-4 text-center table-striped">
    <h2 class="text-center font-weight-bold dark-grey-text mb-4">Riwayat Medis Anda</h2>
  <thead class="bg-primary">
    <tr class="text-white">
      <th scope="col">Tanggal</th>
      <th scope="col">Dokter</th>
      <th scope="col">Poli</th>
      <th scope="col">Biaya Periksa</th>
      <th scope="col">Obat</th>
      <th scope="col">Keterangan</th>
    </tr>
  </thead>
  <tbody>
    @if(count($history) == null)
    <tr>
      <th scope="col" colspan="6">Data kosong</th>
    </tr>
    @else
    @foreach($history as $item)
    <tr>
      <th scope="col">{{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('dddd, D MMM Y') }}</th>
      <th scope="col">{{ $item->dokter->nama }}</th>
      <th scope="col">{{$item->poli}}</th>
      <th scope="col">@currency($item->pembayaran->harga_periksa)</th>
      <th scope="col">
        <ul class="text-capitalize">
        @foreach($item->tambahObat as $tambahObat)  
        <li> {{ $tambahObat->obat->nama_obat }}</li>
      @endforeach
      </ul>
      </th>
      @if($item->keterangan == null)
      <th scope="col">-</th>
      @else
      <th scope="col">{{$item->keterangan}}</th>
      @endif
    </tr>
    @endforeach
    @endif
</tbody>
</table>
<div class="d-flex justify-content-start mt-4">
                    <a href="/dashboard">< Kembali</a>
                </div>
      @else
    <div class="col-md-4">
      <div class="card cards">
        <div class="card-body">
        <img src="https://www.gunasehat.com/img/icon/homecare.png" alt="" class="mb-3 mt-3" style="max-width:75px;">
          <h5 class="card-title">Pendaftaran</h5>
          <p class="card-text">Daftar untuk pasien baru</p>
          <a href="/daftarperiksa" class="btn btn-lg btn-primary text-capitalize rounded-8">Daftar</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card cards">
        <div class="card-body">
            <img src="https://www.gunasehat.com/img/icon/poli_estetika.png" alt="" class="mb-3 mt-3" style="max-width:68px;">
          <h5 class="card-title">Riwayat medis</h5>
          <p class="card-text">Lihat riwayat medis anda</p>
          <button wire:click.prevent="lihatRiwayat" class="btn btn-lg btn-primary text-capitalize rounded-8">Lihat</button>
        </div>
      </div>
    </div>


    <div class="col-md-4">
      <div class="card cards">
        <div class="card-body">
        <img src="https://www.gunasehat.com/img/icon/poli_umum.png" alt="" class="mb-3 mt-3" style="max-width:70px;">
          <h5 class="card-title">Jadwal dokter</h5>
          <p class="card-text">Lihat jadwal dokter yang tersedia</p>
          <button wire:click.prevent="lihatjadwaldokter" class="btn btn-lg btn-primary text-capitalize rounded-8">Lihat</button>
        </div>
      </div>
    </div>
    @endif
    @endif

    @if(auth()->user()->isPerawat == true)
    @if($daftarObat)
    <livewire:lihat-obat/>
    @elseif($formHistory)
    <livewire:history-pasien/>
    @else
    <div class="col-md-3">
      <div class="card cards">
        <div class="card-body">
        <i class="fa-solid fa-hospital-user mb-3 text-success" style="font-size:50px;"></i>
          <h5 class="card-title mb-4">Daftar Pasien</h5>
          <a href="/perawat/daftarpasien" class="btn btn-lg btn-primary text-capitalize rounded-8">Lihat</a>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card cards">
        <div class="card-body">
        <i class="fa-solid fa-receipt mb-3 text-success" style="font-size:50px;"></i>
          <h5 class="card-title mb-4">History pasien</h5>
          <button wire:click.prevent="historyPasien" class="btn btn-lg btn-primary text-capitalize rounded-8">Lihat</button>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card cards">
        <div class="card-body">
        <i class="fa-solid fa-tablets mb-3 text-success" style="font-size:50px;"></i>
          <h5 class="card-title mb-4">Lihat daftar obat</h5>
          <button wire:click.prevent="seeObat" class="btn btn-lg btn-primary text-capitalize rounded-8">Lihat</button>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card cards">
        <div class="card-body">
        <i class="fa-solid fa-user-doctor mb-3 text-success" style="font-size:50px;"></i>
          <h5 class="card-title mb-4">Buat jadwal dokter</h5>
          <a href="/perawat/jadwaldokter" class="btn btn-lg btn-primary text-capitalize rounded-8">Buat</a>
        </div>
      </div>
    </div>
    @endif
    @endif
    
    @if(auth()->user()->isAdmin == true)
    @if($formPerawat)
    <livewire:perawat-akun/>
    @elseif($pasienBaru)
    <livewire:pasien-baru/>
    @else
    <div class="col-md-3">
      <div class="card cards">
        <div class="card-body">
        <i class="fas fa-hospital mb-3 text-success" style="font-size:50px;"></i>
          <h5 class="card-title">Pendaftaran Periksa</h5>
          <button wire:click.prevent="lihatBaru" class="btn btn-lg btn-primary text-capitalize rounded-8 mt-4 position-relative">
            Lihat pendaftaran terbaru
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-danger">
        {{$periksa}}
        <span class="visually-hidden">unread messages</span>
    </span>
    </button>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card cards">
        <div class="card-body">
        <i class="fas fa-user-nurse mb-3 text-success" style="font-size:50px;"></i>
          <h5 class="card-title">Buat akun perawat</h5>
          <button wire:click.prevent="createPerawat" class="btn btn-lg btn-primary text-capitalize rounded-8 mt-4">Buat</button>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card cards">
        <div class="card-body">
        <i class="fa-solid fa-notes-medical mb-3 text-success" style="font-size:50px;"></i>
          <h5 class="card-title">Buat daftar obat</h5>
          <a href="/admin/obat" class="btn btn-lg btn-primary text-capitalize rounded-8 mt-4">Buat</a>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card cards">
        <div class="card-body">
        <i class="fa-solid fa-user-doctor mb-3 text-success" style="font-size:50px;"></i>
          <h5 class="card-title">Buat daftar dokter</h5>
          <a href="/admin/dokter" class="btn btn-lg btn-primary text-capitalize rounded-8 mt-4">Buat</a>
        </div>
      </div>
    </div>

    <div class="col-md-3 mt-4 mb-6">
      <div class="card cards">
        <div class="card-body">
        <i class="fa-solid fa-users mb-3 text-success" style="font-size:50px;"></i>
          <h5 class="card-title">Lihat daftar pasien</h5>
          <a href="/admin/lihatpasien" class="btn btn-lg btn-primary text-capitalize rounded-8 mt-4">Lihat</a>
        </div>
      </div>
    </div>
    @endif
    @endif 
  </div>
        </div>
    </div>

</div>