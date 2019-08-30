<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Epeakup - @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Favicons -->
    <link href="{{asset('/')}}frontEnd/favicon/favicon.png" rel="icon">
    <link href="{{asset('/')}}frontEnd/img/apple-touch-icon.png" rel="apple-touch-icon"/>

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('') }}backEnd/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('') }}backEnd/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('') }}backEnd/bower_components/Ionicons/css/ionicons.min.css">
@stack('styles')
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('') }}backEnd/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('') }}backEnd/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('') }}backEnd/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('') }}backEnd/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet"
          href="{{ asset('') }}backEnd/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('') }}backEnd/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('') }}backEnd/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-purple sidebar-mini fixed">
<div class="wrapper">

    @include('backEnd.inc.mainHeader')
    <!-- Left side column. contains the logo and sidebar -->
    @include('backEnd.inc.mainNav')
    <!-- Content Wrapper. Contains page content -->
    @yield('body')
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            Developed by <a href="https://www.softthreat.com/" target="_blank">SoftThreat </a>
        </div>
        <strong>Copyright &copy; 2019 <a href="http://epeakup.com" target="_blank">ePeakup.com</a>.</strong> All
        rights
        reserved.
    </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('') }}backEnd/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('') }}backEnd/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('') }}backEnd/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="{{ asset('') }}backEnd/bower_components/raphael/raphael.min.js"></script>
<script src="{{ asset('') }}backEnd/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('') }}backEnd/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="{{ asset('') }}backEnd/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{ asset('') }}backEnd/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('') }}backEnd/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('') }}backEnd/bower_components/moment/min/moment.min.js"></script>
<script src="{{ asset('') }}backEnd/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="{{ asset('') }}backEnd/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('') }}backEnd/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="{{ asset('') }}backEnd/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{ asset('') }}backEnd/bower_components/fastclick/lib/fastclick.js"></script>
@stack('scripts')
<!-- AdminLTE App -->
<script src="{{ asset('') }}backEnd/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('') }}backEnd/dist/js/pages/dashboard.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('') }}backEnd/dist/js/demo.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if (session()->has('message'))
    <script>
        swal("Good job!", "{{ session('message') }}", "success");
    </script>
@endif

@if (session()->has('warning'))
    <script>
        swal("It can be Danger!", "{{ session('warning') }}", "warning");
    </script>
@endif
@if (session()->has('success'))
    <script>
        swal("Good job!", "{{ session('success') }}", "success");
    </script>
@endif
</body>
</html>
