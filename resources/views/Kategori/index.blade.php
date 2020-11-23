@extends ('layouts.app')

@section('title','Kategori')

@section('content')
<a href="/kategori/create" class="card-link btn-warning">Tambah Kategori</a>
@foreach ($kategori as $kategori)

<div class="card" style="width: 18rem;">
<img src="{{ url('image') }}/{{ $kategori['Gambar'] }}" class="card-img-top" alt="...">
  <div class="card-body">
   <h5> <a href="/Kategori/{{$kategori['Id']}}" class="card-title">{{ $kategori ['Nama'] }}</h5>
    <p class="card-text">{{ $kategori['description'] }}</p>
    <hr>
@foreach ($kategori ->products as $product)
<li> {{$product->nama}} </li>
@endforeach

    <hr>

    <a href="/kategori/{{$kategori['Id']}}/edit" class="card-link btn-success">Edit Kategori</a>
    <form action="/kategori/{{ $kategori['Id']}}" method="POST">
      @csrf
      @method('DELETE')
    <button class="card-link btn-primary">Hapus Kategori</a>
    </form>
  </div>
</div>

@endforeach
<div class="container push-spaces">
</div>
<div class="d-flex justify-content-center">
    {{ $kategori->links() }}
    </div>
    
@endsection

   
