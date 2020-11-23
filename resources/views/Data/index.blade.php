@extends ('layouts.app')

@section('title','Data')

@section('content')
<form action="/data">
  <div class="form-group">
    <label for="exampleInputEmail1">Nama </label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Alamat</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group form-check">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection

   
