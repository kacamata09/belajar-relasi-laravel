@extends('snippets.cssjs')

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="AdminLTE-3.2.0/../../index2.html"><b>Admin</b>LTE</a>
  </div>

@section('isi')

<!-- /.login-logo -->
<div class="card">
@yield('input')
  </div>
  </div>
  <!-- /.login-box -->

@endsection