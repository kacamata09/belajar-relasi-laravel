@extends('snippets.layoutInput')

@section('input')
    
<div class="card-body login-card-body">
    <p class="login-box-msg">Silahkan masukkan Data Anda</p>
  
    <form action="/register" method="post">
      @csrf
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="name" placeholder="Nama Lengkap">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="email" class="form-control" name="email" placeholder="Email">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  
  

    <p class="mb-0">
      <a href="/login" class="text-center">Login</a>
    </p>
  </div>
  <!-- /.login-card-body -->
@endsection
