@extends ('layouts.app')

@section('title','Data')

@section('content')
<form action="/data" method="POST">
@csrf
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Nama :</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp" value="{{old('nama')}}">
    @error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Alamat:</label>
    <input type="text" class="form-control" name="alamat" id="exampleInputPassword1" value="{{old('bahan')}}">
    @error('alamat')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

    
@endsection

   
