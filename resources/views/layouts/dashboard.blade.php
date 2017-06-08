<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- App title -->
    <title>{{env('APP_NAME')}}</title>

    <!-- App css -->
    <link href="{{asset('zirco/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('zirco/assets/css/core.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('zirco/assets/css/components.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('zirco/assets/css/icons.cs')}}s" rel="stylesheet" type="text/css" />
    <link href="{{asset('zirco/assets/css/pages.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('zirco/assets/css/menu.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('zirco/assets/css/responsive.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('zirco/plugins/switchery/switchery.min.css')}}">

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="{{asset('zirco/assets/js/modernizr.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('css/tokenize2.min.css')}}">

    <!-- Sweet Alert -->
    <link href="{{asset('zirco/plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('zirco/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    @yield('stylesheets')
    @if(!empty($client->options['color']))
    <style>
         .panel-primary,.panel-info .panel-heading, .topbar-left, .navbar-default {
            background-color: {{$client->options['color']}} !important;
        }
         .btn-primary, .btn-info,.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .btn-primary.focus, .btn-primary:active, .btn-primary:focus, .btn-primary:hover, .open > .dropdown-toggle.btn-primary,
        .btn-info:hover, .btn-info:focus, .btn-info:active, .btn-info.active, .btn-info.focus, .btn-info:active, .btn-info:focus, .btn-info:hover, .open > .dropdown-toggle.btn-info {
            background-color: {{$client->options['color']}}  !important;
            border: 1px solid {{$client->options['color']}}  !important;
        }

    </style>
    @endif
</head>


<body class="fixed-left">

<!-- Loader -->
<div id="preloader">
    <div id="status">
        <div class="spinner">
            <div class="spinner-wrapper">
                <div class="rotator">
                    <div class="inner-spin"></div>
                    <div class="inner-spin"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left" style="@if(!empty($client->options['color'])) background-color: {{$client->options['color']}}; @endif">
            <a href="{{url('home')}}" class="logo"><span>{{env('APP_NAME')}}</span><i class="mdi mdi-cube"></i></a>
            <!-- Image logo -->
            <!--<a href="index.html" class="logo">-->
            <!--<span>-->
            <!--<img src="assets/images/logo.png" alt="" height="30">-->
            <!--</span>-->
            <!--<i>-->
            <!--<img src="assets/images/logo_sm.png" alt="" height="28">-->
            <!--</i>-->
            <!--</a>-->
        </div>

        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation" >
            <div class="container">

                <!-- Navbar-left -->
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <button class="button-menu-mobile open-left waves-effect waves-light">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
                    <li class="hidden-xs">
                        <form role="search" class="app-search">
                            <input type="text" placeholder="{{_t('Search')}}..."
                                   class="form-control">
                            <a href=""><i class="fa fa-search"></i></a>
                        </form>
                    </li>
                    {{--<li class="hidden-xs">
                        <a href="#" class="menu-item waves-effect waves-light">New</a>
                    </li>--}}
                    <li class="dropdown hidden-xs">
                        <a data-toggle="dropdown" class="dropdown-toggle menu-item waves-effect waves-light" href="#" aria-expanded="false">
                            <span class="caret"></span>{{ _t('Language') }}</a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="{{url('/en/dashboard/'. $client->id)}}">{{_t('English',[], 'en')}}</a></li>
                            <li><a href="{{url('/de/dashboard/'. $client->id)}}">{{_t('German',[], 'de')}}</a></li>
                            <li><a href="{{url('/fr/dashboard/'. $client->id)}}">{{_t('French',[], 'fr')}}</a></li>
                            <li><a href="{{url('/it/dashboard/'. $client->id)}}">{{_t('Italian',[], 'it')}}</a></li>
                            <li><a href="{{url('/es/dashboard/'. $client->id)}}">{{_t('Spanish',[], 'es')}}</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- Right(Notification) -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown user-box">
                        <a href="" class="dropdown-toggle waves-effect waves-light user-link" data-toggle="dropdown" aria-expanded="true">
                            <img src="{{$client->logoSrc}}" style="height:40px" alt="user-img" class="img-circle user-img">
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">

                            {{--<li><a href="javascript:void(0)"><i class="ti-user m-r-5"></i> Profile</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-settings m-r-5"></i> Settings</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-lock m-r-5"></i> Lock screen</a></li>--}}
                            <li><a href="{{url('home')}}"><i class="ti-power-off m-r-5"></i> @tlang('Exit')</a></li>
                        </ul>
                    </li>

                </ul> <!-- end navbar-right -->

            </div><!-- end container -->
        </div><!-- end navbar -->
    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul>
                    <li class="menu-title">Business: <br>{{$client->name}}</li>
                    <li><a href="" class="waves-effect"><span class="fa fa-home"></span>  Dashboard</a> </li>
                    <li class="divider"></li>
                    <li><a href="{{route('user.client.dashboard.officers', ['client'=>$client->id])}}" data-ajax="true" class="waves-effect"><i class="fa fa-user-secret" style=""></i>  @tlang('Cash Officers')</a> </li>
                    <li class="divider" ></li>
                    <li><a href="{{route('user.client.dashboard.customers', ['client'=>$client->id])}}" data-ajax="true" class="waves-effect"><i class="fa fa-users"></i>  @tlang('Customers')</a> </li>
                    <li class="divider"></li>
                    <li><a href="{{route('user.client.dashboard.services', ['client'=>$client->id])}}" data-ajax="true" class="waves-effect"><i class="fa fa-cogs"></i>  @tlang('Services')</a> </li>
                    <li class="divider"></li>
                    <li><a href="{{route('user.client.dashboard.invoices', ['client'=>$client->id])}}" data-ajax="true" class="waves-effect"><i class="fa fa-list"></i>  @tlang('Invoices')</a> </li>
                    <li class="divider"></li>
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-wrench"></i><span> @tlang('Setting') </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{route('user.client.dashboard.states', ['client'=>$client->id])}}" data-ajax="true">@tlang('Provinces/Cities')</a></li>
                            <li><a href="{{route('user.client.dashboard.setting', ['client'=>$client->id])}}" data-ajax="true">@tlang('Options')</a></li>
                        </ul>
                    </li>
                    <li class="divider"></li>
                    <li><a data-ajax="true" href="{{url('home')}}" class="waves-effect"><i class="fa fa-arrow-left"></i>  @tlang('My Busunesses')</a> </li>
                </ul>
            </div>
            <!-- Sidebar -->
            <div class="clearfix"></div>

           {{-- <div class="help-box">
                <h5 class="text-muted m-t-0">For Help ?</h5>
                <p class=""><span class="text-dark"><b>Email:</b></span> <br/> support@support.com</p>
                <p class="m-b-0"><span class="text-dark"><b>Call:</b></span> <br/> (+123) 123 456 789</p>
            </div>--}}

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->

        <div class="content" >

            @yield('content')
        </div> <!-- content -->

        <footer class="footer text-right">
            {{ date('Y') }} &copy; {{env('APP_NAME')}}.
        </footer>

    </div>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->




</div>
<!-- END wrapper -->



<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="{{asset('zirco/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('zirco/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('zirco/assets/js/detect.js')}}"></script>
<script src="{{asset('zirco/assets/js/fastclick.js')}}"></script>
<script src="{{asset('zirco/assets/js/jquery.blockUI.js')}}"></script>
<script src="{{asset('zirco/assets/js/waves.js')}}"></script>
<script src="{{asset('zirco/assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('zirco/assets/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('zirco/plugins/switchery/switchery.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('zirco/assets/js/jquery.core.js')}}"></script>
<script src="{{asset('zirco/assets/js/jquery.app.js')}}"></script>

<script src="{{asset('js/navigate.js')}}"></script>
<script src="{{asset('js/tokenize2.min.js')}}"></script>

<script src="{{asset('zirco/plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>



<script src="{{asset('zirco/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $(function () {
        $(document).on("hidden.bs.modal", function (e) {
            $(e.target).removeData("bs.modal").find(".modal-content .cl").empty();
        });

    })
</script>

@yield('javascript')
</body>
</html>