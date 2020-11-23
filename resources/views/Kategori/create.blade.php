@extends ('layouts.app')

@section('title','Kategori')

@section('content')
<form action="/kategori" method="POST">
@csrf
  <div class="form-group">
    <label for="exampleFormControlFile1">Masukan Gambar</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
  </div>
</form>

<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Nama :</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" value="{{old('nama')}}">
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description:</label>
    <input type="text" class="form-control" name="description" id="exampleInputPassword1" value="{{old('bahan')}}">
    @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Kategori</label>
    <select>
    <option value="1">Lengan Panjang</option>
    <option value="2">Lengan Pendek</option>
    <option value="3">Anak-Anak</option>
  </select>
    @error('kategori')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

    
@endsection

   
