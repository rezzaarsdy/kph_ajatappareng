<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KPH Ajatappareng</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ URL::asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('assets/dist/css/adminlte.min.css')}}">
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
  @stack('css')
  <link rel="icon" href="{{URL::asset('assets/dist/img/1540276247.png')}}" sizes="32x32" />
</head>
<body class="hold-transition sidebar-mini">

<!-- begin wrapper -->

	<div class="wrapper">
	  <!-- Preloader -->
	  <div class="preloader flex-column justify-content-center align-items-center">
	    <img class="animation__shake" src="{{ URL::asset('assets/dist/img/1540276247.png')}}" alt="AdminLTELogo" height="60" width="60">
	  </div>
		@include('admin.partials.navbar')

		@include('admin.partials.sidebar')

		@yield('content')

		@include('admin.partials.footer')

			<!-- Control Sidebar -->
				<aside class="control-sidebar control-sidebar-dark">
		    <!-- Control sidebar content goes here -->
				</aside>
			<!-- /.control-sidebar -->
	</div>

<!-- end wrapper -->

<!-- jQuery -->
<script src="{{ URL::asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- jQuery UI 1.11.4 -->
<script src="{{ URL::asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ URL::asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('assets/dist/js/adminlte.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
 <script src="{{ URL::asset('assets/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{ URL::asset('assets/dist/js/pages/dashboard.js')}}"></script> --}}
@stack('javascript')

@include('admin.partials.toast-message')
</body>
</html>
