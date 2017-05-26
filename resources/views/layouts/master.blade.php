<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{env('APP_NAME')}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/bootstrap.min.css')}}">
    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('assets/fonts/et-lineicons/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/linea-font/css/linea-font.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome/css/font-awesome.min.css')}}">
    <!-- Slider -->
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/slick.css')}}">
    <!-- Lightbox -->
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/magnific-popup.css')}}">
    <!-- Animate.css -->
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/animate.css')}}">
    <!-- Animated Headings -->
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/animated-heading.css')}}">


    <!-- Definity CSS -->
    <link rel="stylesheet" href="{{asset('assets/styles/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/styles/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/tokenize2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/sweetalert.css')}}">
    {{--<link href="{{asset('css/mdb.min.css')}}" rel="stylesheet">--}}

    <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- JS -->
    <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>

    @yield('stylesheets')
</head>
<body id="page-top">

<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->



<!-- ========== Preloader ========== -->

<div class="preloader">
    <img src="{{asset('assets/images/loader.svg')}}" alt="Loading...">
</div>



<!-- ========== Navigation ========== -->

@include('layouts.navbar')



@yield('content')


<!-- ========== Footer Contact ========== -->
<div style="height: 60px">

</div>
<footer id="contact" class="footer-contact" style="position: fixed; bottom: 0px; width: 100%">
    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <small>&copy; {{ date('Y') }} {{env('APP_NAME')}}. Powered by <a class="no-style-link" href="http://upperlink.ng" target="_blank">Upperlink</a></small>
                </div>

                <div class="col-md-6">
                    <small><a href="#page-top" class="pull-right to-the-top">To the top<i class="fa fa-angle-up"></i></a></small>
                </div>

            </div><!-- / .row -->
        </div><!-- / .container -->
    </div><!-- / .copyright -->
</footer><!-- / .footer-contact -->



<!-- ========== Scripts ========== -->

<script src="{{asset('assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/google-fonts.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.easing.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/bootstrap-hover-dropdown.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/smoothscroll.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.localScroll.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.stellar.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.parallax.js')}}"></script>
<script src="{{asset('assets/js/vendor/slick.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.easypiechart.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/countup.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/isotope.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/wow.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/animated-heading.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.ajaxchimp.js')}}"></script>
<script src="{{asset('js/navigate.js')}}"></script>
<script src="{{asset('js/tokenize2.min.js')}}"></script>

{{--<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/tether.min.js')}}"></script>--}}


<!-- Definity JS -->
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="{{asset('js/sweetalert.min.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
})
</script>

@yield('javascript')
</body>

</html>
