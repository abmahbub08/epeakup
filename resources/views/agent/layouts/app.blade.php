<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Epeakup | @yield('title')</title>

    <!-- Favicons -->
    <link href="{{asset('/')}}frontEnd/favicon/favicon.png" rel="icon">
    <link href="{{asset('/')}}frontEnd/img/apple-touch-icon.png" rel="apple-touch-icon"/>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('boomboom') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    {{--  Toastr style  --}}
    <link rel="stylesheet" href="{{ asset('boomboom/'.'/plugins/toastr/toastr.min.css') }}">
{{--  Extra style  --}}
@yield('styles')
@stack('styles')
<!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('boomboom') }}/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">

    <!-- Navbar -->
@include('agent.layouts.nav')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('agent.layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; {{ date('Y') }} <a href="https://epeakup.com">Epeakup.com</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 0.1.0-beta.1
        </div>
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('boomboom') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{ asset('boomboom') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
{{-- Toasta --}}
<script src="{{ asset('boomboom/'.'/plugins/toastr/toastr.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ asset('boomboom') }}/dist/js/adminlte.js"></script>

<script>
    // Display an info toast with no title
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif
    @if(Session::has('info'))
    toastr.info("{{ Session::get('info') }}")
    @endif
    @if(Session::has('error'))
    toastr.warning("{{ Session::get('error') }}")
    @endif
    @if(Session::has('warning'))
    toastr.warning("{{ Session::get('warning') }}")
    @endif
</script>
@yield('scripts')
@stack('scripts')
</body>
</html>
