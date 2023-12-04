<div>
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
    @if($registerForm)
        <form>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nama (Sesuai KTP) :</label>
                        <input type="text" wire:model="name" class="form-control">
                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Email :</label>
                        <input type="text" wire:model="email" class="form-control">
                        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Password :</label>
                        <input type="password" id="password" wire:model="password" name="password" class="form-control">
                        @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <br>
                    <button class="btn text-white btn-primary rounded-9 text-capitalize" wire:click.prevent="registerStore">Register</button>
                </div>
                <div class="col-md-12">
                    Sudah punya akun?<br>
                    <a class="text-primary rounded-9 text-capitalize text-decoration-underline" href="" wire:click.prevent="register"><strong>Login</strong></a>
                </div>
            </div>
        </form>
    @else
    <form method="POST" action="{{ ('login') }}">                    
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                            
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary rounded-9">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <div class="col-md-12">
                    Belum punya akun?
                    <br> 
                    <a class="text-primary rounded-9 text-capitalize text-decoration-underline" href="" wire:click.prevent="register"><strong>Registrasi</strong></a>
                </div>
                        </div>
                        
                    </form>
    @endif
</div>