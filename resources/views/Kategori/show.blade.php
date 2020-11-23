@extends ('layouts.app')

@section('title','Cobaaaaa')

@section('content')
<div class="card">
    <div class="card-body">
        <h3>Nama : {{$products['nama'] }}</h3>
        <h3>Harga: {{$products['harga'] }}</h3>
        <h3>Bahan: {{$products['bahan'] }}</h3>
    </div>
</div>
@endsection

   
