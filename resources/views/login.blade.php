@extends('snippets.layoutInput')

@section('input')

<div class="card-body login-card-body">
  <p class="login-box-msg">Silahkan masukkan Email dan Password</p>

  <form action="/login" method="post">
    @csrf
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
    <div class="row">
      <div class="col-8">
        <div class="icheck-primary">
          <input type="checkbox" id="remember">
          <label for="remember">
            Remember Me
          </label>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-4">
        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
      </div>
      <!-- /.col -->
    </div>
  </form>



  <p class="mb-1">
    <a href="/lupapassword">I forgot my password</a>
  </p>
  <p class="mb-0">
    <a href="/register" class="text-center">Register</a>
  </p>
</div>
<!-- /.login-card-body -->

@endsection

    