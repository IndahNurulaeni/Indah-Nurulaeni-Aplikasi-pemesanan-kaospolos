@extends ('layouts.app')

@section('title','Data')

@section('content')
<form action="/data/{{ $data ['Id']}}" method="POST">
    @csrf
    @method('PUT')
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Name :</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" value="{{old('nama') ? old('nama'): $product['nama'] }}">
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Alamat:</label>
    <input type="text" class="form-control" name="alamat" id="exampleInputPassword1" value="{{old('bahan') ? old('bahan'): $product['bahan'] }}">
    @error('alamat')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

    
@endsection

   
