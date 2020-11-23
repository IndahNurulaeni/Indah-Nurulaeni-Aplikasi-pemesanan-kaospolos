@extends ('layouts.app')

@section('title','Products')

@section('content')
<form action="/products" method="POST">
@csrf
  <div class="form-group">
    <label for="exampleFormControlFile1">Masukan Gambar</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
  </div>
</form>

<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Nama :</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp" value="{{old('nama')}}">
    @error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Bahan:</label>
    <input type="text" class="form-control" name="bahan" id="exampleInputPassword1" value="{{old('bahan')}}">
    @error('bahan')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Harga</label>
    <input type="text" class="form-control" name="harga" id="exampleInputPassword1" value="{{old('harga')}}">
    @error('harga')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

    
@endsection

   
