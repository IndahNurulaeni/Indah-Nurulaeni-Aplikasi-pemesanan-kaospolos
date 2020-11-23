@extends ('layouts.app')

@section('title','Kategori')

@section('content')
<form action="/kategori/{{ $kategori ['Id']}}" method="POST">
    @csrf
    @method('PUT')
  <div class="form-group">
    <label for="exampleFormControlFile1">Masukan Gambar</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
  </div>
</form>

<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Name :</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" value="{{old('name') ? old('name'): $kategori['name'] }}">
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description:</label>
    <input type="text" class="form-control" name="description" id="exampleInputPassword1" value="{{old('description') ? old('description'): $kategori['description'] }}">
    @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

    
@endsection

   
