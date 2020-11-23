@extends('layouts.app')

@section('title','welcome')

@section('content')
<form action="/products">
  <div class="form-group">
  <h1><marquee behavior=scroll direction=left loop=15>Selamat Datang </marquee></h1>
  <p> Silakan Login Dibawah ini</p>
    <label for="exampleInputEmail1">Email </label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group form-check">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
    
</body>