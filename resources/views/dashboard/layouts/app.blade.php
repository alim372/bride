<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bride - @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  @include('dashboard.includes.styles')
  @yield('styles')
<style>

  .hover_item:hover{
    color: #e00a6a !important;
  }
</style>

</head>
<body class="hold-transition skin-blue sidebar-mini" >
<div class="wrapper">

  @include('dashboard.includes.navbar')
  @include('dashboard.includes.sidemenu')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-image: url('{{asset('')}}admin/background2.png');background-repeat: no-repeat, repeat;height: 100%;background-size: cover;background-position: center; !important;">
    @yield('content')
  </div>

  <!-- /.content-wrapper -->
  @include('dashboard.includes.footer')
  {{-- @include('dashboard.includes.controlSidebar') --}}

</div>
<!-- ./wrapper -->

@include('dashboard.includes.scripts')
@yield('scripts')
@include('flashy::message')
</body>
</html>
