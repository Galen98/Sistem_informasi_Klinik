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
    <link href="assets/images/logo.png" rel="icon">
    @livewireStyles
</head>
<body class="d-flex flex-column min-vh-100">
<livewire:navigation/>
    
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="mt-5 col-md-8">
                <div class="card">
                    <div class="card-header text-white" style="background-color:#51b02b;">
                    <h5 style="font-size: 23px;">Login / Registrasi</h5></div>
                    <div class="card-body">
                    <livewire:login-register/> 
                    </div>
                </div>
            </div>
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
</body>
</html>