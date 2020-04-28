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


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('dashboard.includes.navbar')
  @include('dashboard.includes.sidemenu')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('header')
    {{-- <div class="container-fluid" style="margin-top: 20px">
      <div class="box" style="padding:25px">
        @yield('box')
      </div>
    </div> --}}
  </div>
  <!-- /.content-wrapper -->

  @include('dashboard.includes.footer')
  {{-- @include('dashboard.includes.controlSidebar') --}}

</div>
<!-- ./wrapper -->

@include('dashboard.includes.scripts')
@yield('scripts')
</body>
</html>
