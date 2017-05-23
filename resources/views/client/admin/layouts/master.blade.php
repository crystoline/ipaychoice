<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset("client_assets/admin/img/favicon.ico")}}">
    <title>{{env('APP_NAME')}}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('client_assets/admin/lib/stroke-7/style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('client_assets/admin/lib/jquery.nanoscroller/css/nanoscroller.css')}}"/><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="{{ asset('client_assets/admin/lib/select2/css/select2.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('client_assets/admin/lib/theme-switcher/theme-switcher.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('client_assets/admin/lib/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}"/>
    <link type="text/css" href="{{ asset('client_assets/admin/css/style.css')}}" rel="stylesheet">
    @yield('stylesheets')
    <link type="text/css" href="{{ asset('client_assets/admin/css/themes/theme-google.css')}}" rel="stylesheet">
</head>

<body>
<div class="am-wrapper">
    <nav class="navbar navbar-default navbar-fixed-top am-top-header">
        @include('client.admin.parts.topnav')
    </nav>
    <div class="am-left-sidebar">
        <div class="content">
            @include('client.admin.parts.sidebar')
        </div>
    </div>
    <div class="am-content">
        <div class="main-content">
            @yield('content')
        </div>
    </div>
<!--  -->
</div>
<script src="{{ asset('client_assets/admin/lib/jquery/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('client_assets/admin/lib/jquery.nanoscroller/javascripts/jquery.nanoscroller.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('client_assets/admin/js/main.js')}}" type="text/javascript"></script>
<script src="{{ asset('client_assets/admin/lib/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('client_assets/admin/lib/theme-switcher/theme-switcher.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('client_assets/admin/lib/jquery-flot/jquery.flot.js')}}" type="text/javascript"></script>
<script src="{{ asset('client_assets/admin/lib/jquery-flot/jquery.flot.pie.js')}}" type="text/javascript"></script>
<script src="{{ asset('client_assets/admin/lib/jquery-flot/jquery.flot.resize.js')}}" type="text/javascript"></script>
<script src="{{ asset('client_assets/admin/lib/jquery-flot/plugins/jquery.flot.orderBars.js')}}" type="text/javascript"></script>
<script src="{{ asset('client_assets/admin/lib/jquery-flot/plugins/curvedLines.js')}}" type="text/javascript"></script>
<script src="{{ asset('client_assets/admin/lib/jquery.sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('client_assets/admin/lib/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('client_assets/admin/lib/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('client_assets/admin/lib/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js')}}" type="text/javascript"></script>
<script src="{{ asset('client_assets/admin/lib/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>
<script src="{{ asset('client_assets/admin/lib/jquery.vectormap/maps/jquery-jvectormap-uk-mill-en.js')}}" type="text/javascript"></script>
<script src="{{ asset('client_assets/admin/lib/jquery.vectormap/maps/jquery-jvectormap-fr-merc-en.js')}}" type="text/javascript"></script>
<script src="{{ asset('client_assets/admin/lib/jquery.vectormap/maps/jquery-jvectormap-us-il-chicago-mill-en.js')}}" type="text/javascript"></script>
<script src="{{ asset('client_assets/admin/lib/jquery.vectormap/maps/jquery-jvectormap-au-mill-en.js')}}" type="text/javascript"></script>
<script src="{{ asset('client_assets/admin/lib/jquery.vectormap/maps/jquery-jvectormap-in-mill-en.js')}}" type="text/javascript"></script>
<script src="{{ asset('client_assets/admin/lib/jquery.vectormap/maps/jquery-jvectormap-map.js')}}" type="text/javascript"></script>
<script src="{{ asset('client_assets/admin/lib/jquery.vectormap/maps/jquery-jvectormap-ca-lcc-en.js')}}" type="text/javascript"></script>
<script src="{{ asset('client_assets/admin/lib/countup/countUp.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('client_assets/admin/lib/chartjs/Chart.min.j')}}s" type="text/javascript"></script>


 <script src="{{ asset('client_assets/admin/lib/datatables/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('client_assets/admin/lib/datatables/js/dataTables.bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('client_assets/admin/lib/datatables/plugins/buttons/js/dataTables.buttons.js')}}" type="text/javascript"></script>
    <script src="{{ asset('client_assets/admin/lib/datatables/plugins/buttons/js/buttons.html5.js')}}" type="text/javascript"></script>
    <script src="{{ asset('client_assets/admin/lib/datatables/plugins/buttons/js/buttons.flash.js')}}" type="text/javascript"></script>
    <script src="{{ asset('client_assets/admin/lib/datatables/plugins/buttons/js/buttons.print.js')}}" type="text/javascript"></script>
    <script src="{{ asset('client_assets/admin/lib/datatables/plugins/buttons/js/buttons.colVis.js')}}" type="text/javascript"></script>
    <script src="{{ asset('client_assets/admin/lib/datatables/plugins/buttons/js/buttons.bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{ asset('client_assets/admin/lib/select2/js/select2.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        //initialize the javascript
        App.init();
        App.dashboard();

    });
</script>

    <script type="text/javascript">
    $(document).ready(function(){
        App.livePreview();
    });

</script>
{{--<script type="text/javascript">
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-68396117-1', 'auto');
    ga('send', 'pageview');


</script>--}}
@yield('javascript')

</body>
</html>