@extends('snippets.main')

@section('konten')
<div class="row justify-content-center mt-4">
  <div class="col-6">
    <h2>Login</h2>
    <form action="/login" method="POST">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Email" aria-label="Email" name="email" aria-describedby="basic-addon1">
          </div>
          
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Password" type="password" aria-label="Password" name="password" aria-describedby="basic-addon2">
          </div>
        <input class="btn btn-primary" type="submit" value="Login">
        </form>
        <a href="/register">Daftar Akun</a>
  </div>
</div>

@endsection

    