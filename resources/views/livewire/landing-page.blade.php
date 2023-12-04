<!DOCTYPE html>
<html>
<head>
    <title>Klinik Pratama Karunia Husada</title>
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css"
    rel="stylesheet"
    />
    <link href="assets/images/logo.png" rel="icon">
    @livewireStyles
</head>
<body class="d-flex flex-column min-vh-100">
<livewire:navigation/>
    
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="mt-5">
            <h1 class="text-center font-weight-bold dark-grey-text wow fadeIn" data-wow-delay="0.2s">
                Selamat datang di website pendaftaran Online <br/> Klinik Pratama Karunia Husada</h1>
                <br/>
                <p class="text-center grey-text w-responsive mx-auto mb-5 wow fadeIn" data-wow-delay="0.2s">
         1. Pendaftaran Online dilayani pada jam 06.00-10.00 WIB.<br>
         2. Jadwal Dokter dapat berubah sewaktu waktu. Wajib Mengisikan nomer Whatsapp <br>untuk informasi perubahan jadwal dokter secara mendadak.<br>
         3. Bukti Pendaftaran Online dibawa hari saat registrasi ulang di Klinik Pratama Karunia Husada.<br>
         4. Pasien yang telah melakukan registrasi online diharapkan datang tepat waktu.
        </p>

        <div class="row justify-content-lg-center">
          <center>
                            <div>
                                <div class="col-md-8 form-group text-center">
                                  @guest
                                    <a class="btn btn-primary btn-md  rounded-7" href="/login" style="font-size:Medium;">
                                    Daftar Sekarang</a>
                                  @else
                                  @if(auth()->user()->isUser == 1)
                                  <a class="btn btn-primary btn-md  rounded-7" href="/" style="font-size:Medium;">
                                    Daftar Sekarang</a>
                                  @endif
                                  @endguest
                                  </div>
                            </div>
                            </center>
        </div>
            </div>
        </div>
        <br>
        <br>
        <section id="features" class="mt-5 mb-5 pb-5">
        <h1 class="text-center mb-5 mt-5 pt-5 font-weight-bold dark-grey-text wow fadeIn" data-wow-delay="0.2s">
           Layanan Kami</h1>
        <p class="text-center grey-text w-responsive mx-auto mb-5 wow fadeIn" data-wow-delay="0.2s">
        Kami memberikan kepada Anda pilihan terbaik untuk Anda. Sesuaikan dengan kebutuhan kesehatan Anda.</p>

        <div class="row features-big my-4 text-center">
        <div class="col-md-4 mb-4 wow fadeIn" data-wow-delay="0.4s">
            <div class="card hoverable">
              <center>
                <img src="https://www.gunasehat.com/img/icon/online_pharmacy.png" class="mt-3 mb-3" style="max-width:75px;" alt="">
                </center>
              <h5 class="font-weight-bold mb-4">Farmasi</h5>
                <p class=" grey-text
                font-small mx-3">Kami akan memberikan obat-obatan yang terbaik untuk anda.
            </p>
            
            </div>
          </div>

          <div class="col-md-4 mb-4 wow fadeIn" data-wow-delay="0.4s">
            <div class="card hoverable">
              <center>
                <img src="https://www.gunasehat.com/img/icon/poli_umum.png" class="mt-3 mb-3" style="max-width:90px;" alt="">
                </center>
              <h5 class="font-weight-bold mb-4">Poli Umum</h5>
                <p class=" grey-text
                font-small mx-3">Melayani konsultasi dan periksa kesehatan dengan dokter umum.
            </p>
            </div>
          </div>

          <div class="col-md-4 mb-4 wow fadeIn" data-wow-delay="0.4s">
            <div class="card hoverable">
              <center>
                <img src="https://www.gunasehat.com/img/icon/poli_gigi.png" class="mt-3 mb-3" style="max-width:88px;" alt="">
                </center>
              <h5 class="font-weight-bold mb-4">Poli Gigi</h5>
                <p class=" grey-text
                font-small mx-3">Melayani konsultasi dan periksa kesehatan dengan dokter gigi.
            </p>
            </div>
          </div>
        </div>


</section>
    </div>

    <livewire:footer/>
    @livewireScripts
    <!-- MDB -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.0.0-alpha.1/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"
    ></script>
</body>
</html>