@extends ('layouts.app')

@section('title','Products')

@section('content')
<a href="/products/create" class="card-link btn-warning">Tambah Order</a>
<div class="container" >
    <div class="row justify-content-center">
@foreach ($products as $product)
<div class="col-md-4">
<div class="card" style="width: 18rem;">
<img src="{{ url('image') }}/{{ $product['Gambar'] }}" class="card-img-top" alt="...">
  <div class="card-body">
   <h5> <a href="/products/{{$product['Id']}}" class="card-title">{{ $product ['Nama'] }}</h5>
    <h6 class="card-subtitle mb-2 text-muted"> Rp. {{ number_format($product['Harga'],0,',','.') }}</h6>
    <p class="card-text">{{ $product ['Bahan'] }}</p>
    <div class="row justify-content-center">
    <a href="/products/{{$product['Id']}}/edit" class="btn btn-success">Edit</a>
    <form action="/products/{{ $product['Id']}}" method="POST">
      @csrf
      @method('DELETE')
    <button class="card-link btn-primary">Hapus</a>
    </form>
    </div>
    </div>
  </div>
</div>

@endforeach
<div class="container push-spaces">
</div>
<div class="d-flex justify-content-center">
    {{ $products->links() }}
    </div>
    
@endsection

   
