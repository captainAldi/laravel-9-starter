
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets-adminlte3/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets-adminlte3/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
</head>

<body class="hold-transition register-page">

<!-- Content -->
@yield('content')
<!-- End Content -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('assets-adminlte3/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets-adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets-adminlte3/dist/js/adminlte.min.js') }}"></script>
<!-- SweetAlert 2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>



<!-- Custom Made by Me -->
<!-- <script src="{{ asset('js/custom.js') }}"></script> -->
<!-- Toastr Message -->
<script>
    //message with toastr
    @if($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error('{{ $error }}');
        @endforeach
    @elseif(Session::has('error'))
        toastr.error( '{{Session::get('error')}}' ); 
    @elseif(Session::has('pesan'))
        toastr.success( '{{Session::get('pesan')}}' ); 
    @elseif(Session::has('status'))
        toastr.success( '{{Session::get('status')}}' ); 
    @endif
</script>
@stack('scripts')
</body>
</html>