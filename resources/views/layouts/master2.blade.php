
<!DOCTYPE html>
<html lang="en" class="full-height">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{ env('APP_NAME') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('mdb/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="{{asset('mdb/css/mdb.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/tokenize2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/sweetalert.css')}}">
    <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">


    <!-- Your custom styles (optional) -->
    <link href="{{asset('mdb/css/style.css')}}" rel="stylesheet">

    @yield('stylesheets')
</head>

<body class="indigo-skin intro-page university-lp">

<!--Navigation & Intro-->
@if(request()->path() != '/')
<div>
    @include('layouts.navbar2')
</div>
@else
<header>
    @include('layouts.navbar2')

    <!--Mask-->
    <div class="view intro" id="home">
        <div class="hm-black-strong">
            <div class="full-bg-img flex-center">
                <div class="container">
                    <div class="row smooth-scroll">
                        <div class="col-md-12 white-text text-center smooth-scroll">
                            <div class="wow fadeInDown" data-wow-delay="0.2s">
                                <h2 class="brand-name font-bold mb-2">{{ env('APP_NAME') }}</h2>
                                <hr class="hr-light">
                                <h3 class="subtext-header mt-2 mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit deleniti consequuntur.</h3>
                            </div>
                            <a href="{{url('register')}}" class="btn btn-primary wow fadeIn" data-wow-duration="2s" data-wow-delay="1s">Sign up Now</a> or
                            <a href="{{url('login')}}" class="btn btn-success wow fadeIn" data-wow-duration="2s" data-wow-delay="1s">Sign in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--/Mask-->
</header>
@endif
<!--/.Navigation & Intro-->

<!--Main content-->


        @yield('content')

<!--/Main content-->

<!--Footer-->
<footer class="page-footer center-on-small-only">

    <!--Footer Links-->
    <div class="container-fluid">

        <!--First row-->
        <div class="row wow fadeIn" data-wow-delay="0.2s">

            <!--First column-->
            <div class="col-lg-6 offset-lg-3 text-center mb-1">

                <!--Icon-->
                <i class="fa fa-mortar-board fa-4x orange-text"></i>
                <!--Title-->
                <h2 class="mt-1 mb-1">Join Us</h2>
                <!--Description-->
                <p class="white-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <!--Reservation button-->
                <a href="{{url('register')}}" class="btn btn-primary wow fadeIn" data-wow-duration="2s" data-wow-delay="1s">Sign up Now</a> or
                <a href="{{url('login')}}" class="btn btn-success wow fadeIn" data-wow-duration="2s" data-wow-delay="1s">Sign in</a>

            </div>
            <!--/First column-->

            <hr class="w-100">

        </div>
        <!--/First row-->

        <div class="container mb-1">

            <!--Second row-->
            <div class="row">

                <!--First column-->
                <div class="col-xl-4 col-lg-4 pt-1 pb-1 wow fadeIn" data-wow-delay="0.3s">
                    <!--About-->
                    <h5 class="title">ABOUT MATERIAL DESIGN</h5>

                    <p>Material Design (codenamed Quantum Paper) is a design language developed by Google.</p>

                    <p>Material Design for Bootstrap (MDB) is a powerful Material Design UI KIT for most popular HTML, CSS, and JS framework - Bootstrap.</p>
                    <!--/About -->

                    <div class="footer-socials mt-2">

                        <!--Facebook-->
                        <a type="button" class="btn-floating btn-blue-2 btn-small"><i class="fa fa-facebook"></i></a>
                        <!--Dribbble-->
                        <a type="button" class="btn-floating btn-blue-2 btn-small"><i class="fa fa-dribbble"></i></a>
                        <!--Twitter-->
                        <a type="button" class="btn-floating btn-blue-2 btn-small"><i class="fa fa-twitter"></i></a>
                        <!--Google +-->
                        <a type="button" class="btn-floating btn-blue-2 btn-small"><i class="fa fa-google-plus"></i></a>

                    </div>
                </div>
                <!--/First column-->

                <hr class="w-100 hidden-lg-up">

                <!--Second column-->
                <div class="col-xl-3 offset-xl-1 col-lg-4 col-md-6 mt-1 mb-1 wow fadeIn" data-wow-delay="0.3s">
                    <!--Search-->
                    <h5 class="title">Search something</h5>

                    <ul class="footer-search">
                        <li>
                            <form class="search-form" role="search">
                                <div class="form-group waves-light waves-effect waves-light">
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                            </form>
                        </li>
                    </ul>

                    <!--Info-->
                    <p><i class="fa fa-home pr-1"></i> New York, NY 10012, US</p>
                    <p><i class="fa fa-envelope pr-1"></i> info@example.com</p>
                    <p><i class="fa fa-phone pr-1"></i> + 01 234 567 88</p>
                    <p><i class="fa fa-print pr-1"></i> + 01 234 567 89</p>

                </div>
                <!--/Second column-->

                <hr class="w-100 hidden-md-up">

                <!--Third column-->
                <div class="col-xl-3 offset-xl-1 col-lg-4 col-md-6 mt-1 mb-1 wow fadeIn" data-wow-delay="0.3s">
                    <!--Contact-->
                    <h5 class="title">Recent news</h5>

                    <ul class="footer-posts">
                        <li><a>Ut enim ad minim veniam nostrud.</a><span><p class="grey-text">28 july 2016</p></span></li>
                        <li><a>Duis aute dolor in reprehenderit.</a><span><p class="grey-text">27 july 2016</p></span></li>
                        <li><a>Excepteur sint occaecat cupidatat.</a><span><p class="grey-text">26 july 2016</p></span></li>
                        <li><a>Sed perspiciatis unde omnis iste.</a><span><p class="grey-text">25 july 2016</p></span></li>
                    </ul>

                </div>
                <!--/Third column-->

            </div>
            <!--/Second row-->

        </div>

    </div>
    <!--/Footer Links-->

    <!--Copyright-->
    <div class="footer-copyright wow fadeIn" data-wow-delay="0.3s">
        <div class="container-fluid">
            {{ env('APP_NAME') }} © {{ date('Y') }} Copyright: <a href="http://upperlink.ng">upperlink.ng</a>
        </div>
    </div>
    <!--/Copyright-->

</footer>
<!--/Footer-->

<!-- SCRIPTS -->

<!-- JQuery -->
<script type="text/javascript" src="{{asset('mdb/js/jquery-3.1.1.min.js')}}"></script>

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset('mdb/js/tether.min.js')}}"></script>

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset('mdb/js/bootstrap.min.js')}}"></script>

<script src="{{asset('js/navigate.js')}}"></script>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{asset('mdb/js/mdb.min.js')}}"></script>
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
<script>
    //Animation init
    new WOW().init();
    // Material Select Initialization
    $(document).ready(function() {
       // $('.mdb-select').material_select();
    });

</script>

</body>

</html>