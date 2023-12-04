<div>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:white;">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarRightAlignExample"
      aria-controls="navbarRightAlignExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarRightAlignExample">
    <a class="navbar-brand" href="/"><img src="{{asset('gambar')}}/logo.jpg" style="max-width:70px;" alt=""></a>
      <!-- Left links -->
      
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
      @guest
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="/login">Login</a>
        </li>
        @else
        @if(auth()->user()->isUser == 1)
        <li class="nav-item dropdown text-capitalize">
          <a
            class="nav-link dropdown-toggle"
            href="#"
            id="navbarDropdown"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
          Hallo, {{Auth::user()->name}}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
            <a href="/profil" class="dropdown-item">Tampilkan Profil</a>
            </li>
            <li>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"
              >Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
            </form>
            </li>
          </ul>
        </li>
        @endif
        @if(auth()->user()->isAdmin == 1)
        <li class="nav-item dropdown text-capitalize">
          <a
            class="nav-link dropdown-toggle"
            href="#"
            id="navbarDropdown"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
          Hallo, {{Auth::user()->name}}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"
              >Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
            </form>
            </li>
          </ul>
        </li>
        @endif
        @endguest
      </ul>
    </div>
  </div>
</nav>
</div>
