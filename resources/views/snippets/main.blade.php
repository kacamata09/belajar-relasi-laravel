@extends('snippets.cssjs')

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
  
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="AdminLTE-3.2.0/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>
    
  @section('isi')
      
  
  @include('snippets.navbar')


  @include('snippets.sidebar')
  
  
<div class="content-wrapper">
  
  @include('snippets.header')
  
  
  @yield('konten')
  
  
  @include('snippets.footer')
</div>
  
</div>
  


@endsection

