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
<section>
  <div class="container py-5">
  @if($editProfil)
  <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col col-lg-6 mb-4 mb-lg-0">
  <div class="card shadow-md" style="border-radius: 15px;">
        <form>
          <div class="card-body">
          @if($user)
            <div class="row align-items-center">
              <div class="pe-5">
              <h6 class="mb-3">Nama (Sesuai KTP)</h6>
                <input type="text" wire:model="name" placeholder="Isikan nama anda" class="form-control form-control-lg" value="{{$user->name}}"/>
              </div>
            </div>

            <div class="row align-items-center">
              <div class="pe-5">
              <h6 class="mb-3 mt-3">Umur</h6>
                <input type="number" wire:model="umur" class="form-control form-control-lg" value="{{$user->umur}}" />
              </div>
            </div>

            <div class="row align-items-center">
              <div class="pe-5">
              <h6 class="mb-3 mt-3">Email</h6>
                <input type="email" wire:model="email" class="form-control form-control-lg" placeholder="example@example.com" value="{{$user->email}}" readonly />
              </div>
            </div>

            <div class="row align-items-center">
              <div class="pe-5">
              <h6 class="mb-3 mt-3">No Whatsapp</h6>
                <input type="number" wire:model="no_wa" placeholder="Isikan nomor whatsapp anda" class="form-control form-control-lg" value="{{$user->no_wa}}"/>
              </div>
            </div>

            <div class="row align-items-center">
              <div class="pe-5">
              <h6 class="mb-3 mt-3">Alamat</h6>
                <input type="text" wire:model="alamat" placeholder="Isikan alamat anda" class="form-control form-control-lg" value="{{$user->alamat}}"/>
              </div>
            </div>

            <div class="row pt-2">
                  <button class="btn btn-md rounded-7 mt-4 btn-primary"  wire:click.prevent="updateProfile">Submit</button>
                <div class="d-flex justify-content-start mt-4">
                    <a href="" wire:click.prevent="edit">< Kembali</a>
                </div>
              </div>

            @endif
          </div>
      </form>
        </div>
</div>
</div>
  @else
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3 shadow-md" style="border-radius: .5rem;">
          <div class="row">
            <div class="col">
              <div class="card-body p-4">
                <h4>Data diri</h4>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Email</h6>
                    <p class="text-muted">{{auth()->user()->email}}</p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Nomor Whatsapp</h6>
                    @if(auth()->user()->no_wa == null)
                    <p class="text-muted text-capitalize">(belum diisi)</p>
                    @else
                    <p class="text-muted text-capitalize">{{auth()->user()->no_wa}}</p>
                    @endif
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Nama (Sesuai KTP)</h6>
                    <p class="text-muted text-capitalize">{{auth()->user()->name}}</p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Alamat</h6>
                    @if(auth()->user()->alamat == null)
                    <p class="text-muted text-capitalize">(belum diisi)</p>
                    @else
                    <p class="text-muted text-capitalize">{{auth()->user()->alamat}}</p>
                    @endif
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Umur</h6>
                    @if(auth()->user()->umur == null)
                    <p class="text-muted text-capitalize">(belum diisi)</p>
                    @else
                    <p class="text-muted text-capitalize">{{auth()->user()->umur}} Tahun</p>
                    @endif
                  </div>
                </div>
            
                <div class="row pt-1">
                  <button class="btn btn-md rounded-7 mt-4 btn-primary"  wire:click.prevent="edit">Edit data diri</button>
                <div class="d-flex justify-content-start">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif
</div>
</section>

</div>
