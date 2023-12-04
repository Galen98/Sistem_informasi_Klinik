<div>
<table class="table rounded-4 text-center table-striped">
    <h2 class="text-center font-weight-bold dark-grey-text mb-4">Daftar Obat</h2>
  <thead class="bg-danger">
    <tr class="text-white">
      <th scope="col">Nama obat</th>
      <th scope="col">Jenis obat</th>
      <th scope="col">Supplier</th>
      <th scope="col">Harga</th>
    </tr>
  </thead>
  <tbody>
    @if(count($obats) == null)
    <tr colspan="4">No data</tr>
    @else
    @foreach($obats as $item)
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
<div class="d-flex justify-content-start mt-4">
                    <a href="/dashboard">< Kembali</a>
                </div>
</div>
