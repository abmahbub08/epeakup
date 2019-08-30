<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>ePeakup @yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="" name="keywords"/>
    <meta content="" name="description"/>

    <!-- Favicons -->
    <link href="{{asset('/')}}frontEnd/favicon/favicon.png" rel="icon">
    <link href="{{asset('/')}}frontEnd/img/apple-touch-icon.png" rel="apple-touch-icon"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700"
          rel="stylesheet"/>

    <!-- Bootstrap CSS File -->
    <link href="{{asset('/')}}frontEnd/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Libraries CSS Files -->
    <link href="{{asset('/')}}frontEnd/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="{{asset('/')}}frontEnd/lib/animate/animate.min.css" rel="stylesheet"/>
    <link href="{{asset('/')}}frontEnd/lib/ionicons/css/ionicons.min.css" rel="stylesheet"/>
    <link href="{{asset('/')}}frontEnd/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet"/>
    <link href="{{asset('/')}}frontEnd/lib/lightbox/css/lightbox.min.css" rel="stylesheet"/>
    <link href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css" rel="stylesheet">

@stack('styles')

<!-- Main Stylesheet File -->
    <link href="{{asset('/')}}frontEnd/css/style.css" rel="stylesheet"/>
</head>
<body>
<header id="header" class="fixed-top">
    <div class="container">
        <div class="logo float-left">
            <a href="{{ route('index') }}" class="scrollto">
                <img src="{{asset('/')}}frontEnd/favicon/logo.png" alt="" class="img-fluid"/>
            </a>
        </div>

        <nav class="main-nav float-right d-none d-lg-block">
            <ul>
                @guest
                    <li><a href="{{ route('getStart') }}" data-toggle="tooltip" title="Login and Click Here"
                           class="btn btn-primary gt">Get Start</a></li>
                @else
                    <li><a href="{{ route('getStart') }}" data-toggle="tooltip" title="Click here to Start"
                           class="btn btn-primary gt">Send Money</a></li>
                @endguest
                <li class="active"><a href="{{ route('index') }}">Home</a></li>
                <li><a href="{{ route('howitwork') }}">How it Works</a></li>
                <li><a href="{{ route('help') }}">Help</a></li>

                @guest

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    @if(Route::has('agent.register'))
                        <li class="nav-item">
                            <a class="btn btn-primary gt"
                               href="{{ route('agent.register') }}">{{ __('Become an Agent') }}</a>
                        </li>
                    @endif

                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->firstName }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="">
                            <a href="{{ route('transactions') }}" class="dropdown-item">My Transactions</a>
                            <a href="{{ route('details') }}" class="dropdown-item">My details</a>
                            <a href="{{ route('recipients') }}" class="dropdown-item">My recipents</a>
                            {{--<a href="{{ route('settings') }}" class="dropdown-item">Settings</a>--}}
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </nav>
        <!-- .main-nav -->
    </div>
</header>
<!-- #header -->
<!--==========================
  Content
============================-->

<main role="main">
    @yield('body')
</main>

<!--==========================
  Footer
============================-->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 footer-info">
                    <h3>Epeakup.com</h3>
                    <div id="footerlogo" class="logo float-left">
                        <a href="{{ route('index') }}" class="scrollto">
                            <img src="{{asset('/')}}frontEnd/favicon/logo.png" alt="" class="img-fluid"/>
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="{{ route('admin.login') }}">{{ __('Admin Login') }}</a></li>
                        <li><a href="{{ route('agent.login') }}">{{ __('Agent Login') }}</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('faq') }}">FAQ</a></li>
                        <li><a href="{{ route('tandc') }}">Terms & Privacy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h4>Contact Us</h4>
                    <p>
                        Suit 04, 228 Chapel Road,Bankstown<br/>
                        NSW-2200 <br/>
                        <i class="fa fa-phone" aria-hidden="true"></i> +61480131395<br/>
                        <strong><i class="fa fa-envelope" aria-hidden="true"></i></strong> support@epeakup.com <br/>
                        <strong><i class="fa fa-envelope" aria-hidden="true"></i></strong> info@epeakup.com <br/>

                    </p>

                    <div class="social-links">
                        <a href="" class="twitter"><i class="fa fa-whatsapp"></i></a>
                        <a href="https://www.facebook.com/EpeakUp/" class="facebook" target="_blank"><i
                                    class="fa fa-facebook"></i></a>
                        <a href="https://www.instagram.com/epeakup.au/" class="instagram" target="_blank"><i
                                    class="fa fa-instagram"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-newsletter">
                    <h4>Our Newsletter</h4>
                    <p>
                        For getting Update offer naver forget to subscribe Us.
                    </p>
                    <form class="bg-dark" method="post" action="{{ route('subscribe') }}">
                        @csrf
                        <input type="email" name="email" required><input type="submit" value="Subscribe"/>
                    </form>
                    <br>

                    <img src="//www.mysecuressls.com/images/seals/crazy_secure_03.png" border="0">
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy;2019 Copyright <strong>Epeakup.com</strong>.All Rights Reserved.
        </div>
        <div class="credits">
            Developed by <a href="http://www.softthreat.com" target="_blank">SoftThreat</a>
        </div>
    </div>
</footer>
<!-- #footer -->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<!-- Uncomment below i you want to use a preloader -->
<!-- <div id="preloader"></div> -->

<!-- JavaScript Libraries -->
<script src="{{asset('/')}}frontEnd/lib/jquery/jquery.min.js"></script>
<script src="{{asset('/')}}frontEnd/lib/jquery/jquery-migrate.min.js"></script>
<script src="{{asset('/')}}frontEnd/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/')}}frontEnd/lib/easing/easing.min.js"></script>
<script src="{{asset('/')}}frontEnd/lib/mobile-nav/mobile-nav.js"></script>
<script src="{{asset('/')}}frontEnd/lib/wow/wow.min.js"></script>
<script src="{{asset('/')}}frontEnd/lib/waypoints/waypoints.min.js"></script>
<script src="{{asset('/')}}frontEnd/lib/counterup/counterup.min.js"></script>
<script src="{{asset('/')}}frontEnd/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="{{asset('/')}}frontEnd/lib/isotope/isotope.pkgd.min.js"></script>
<script src="{{asset('/')}}frontEnd/lib/lightbox/js/lightbox.min.js"></script>
<!-- Contact Form JavaScript File -->
<script src="{{asset('/')}}frontEnd/contactform/contactform.js"></script>

<!-- Template Main Javascript File -->
<script src="{{asset('/')}}frontEnd/js/main.js"></script>
{{--Sweet Alert--}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if(session('success'))
    <script>
        swal("Good job!", "{{ session('success') }}", "success");
    </script>
@endif
@if(session('warning'))
    <script>
        swal("Sorry!", "{{ session('warning') }}", "warning");
    </script>
@endif

@stack('scripts')

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

</body>

</html>