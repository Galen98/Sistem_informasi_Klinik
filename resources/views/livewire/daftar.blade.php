<!DOCTYPE html>
<html>
<head>
    <title>Login / Registrasi</title>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="assets/images/logo.png" rel="icon">
    @livewireStyles
    </head>
    <body class="d-flex flex-column min-vh-100">
    <livewire:navigation/>
    
    <div class="container">
        <div class="row mt-5 justify-content-center">
        <livewire:form-daftar/>
        </div>
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
    <script>
        $(document).ready(function () {
            $('#profil').click(function () {
                Swal.fire({
                    title: 'Lengkapi Data diri Anda',
                    text: 'Lengkapi data diri anda sebelum mendaftar periksa',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/profil';
                    } else if (result.dismiss === Swal.DismissReason.cancel) {

                    }
                });
            });
        });
    </script>
   
</body>
</html>