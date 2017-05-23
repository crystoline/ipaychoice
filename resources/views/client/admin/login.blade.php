
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<!-- Mirrored from themeslivepreview.com/amaretti-v1.1.4/pages-login.php?theme=google by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Nov 2015 10:35:17 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset("client_assets/admin/img/favicon.html")}}">
    <title>{{ config('app.name') }} - Login</title>
    <link rel="stylesheet" type="text/css" href="{{ asset("client_assets/admin/lib/stroke-7/style.css")}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("client_assets/admin/lib/jquery.nanoscroller/css/nanoscroller.css")}}"/><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="{{ asset("client_assets/admin/lib/theme-switcher/theme-switcher.min.css")}}"/>
    <link type="text/css" href="{{ asset("client_assets/admin/css/themes/theme-google.css")}}" rel="stylesheet">  </head>
<body class="am-splash-screen">
<div class="am-wrapper am-login">
    <div class="am-content">
        <div class="main-content">
            <div class="login-container">
                <div class="panel panel-default">
                    <div class="panel-heading"><img src="{{ asset("client_assets/admin/img/upper-logo.png")}}" alt="logo" width="150px" height="60px" class="logo-img"><span>Please enter your user information.</span></div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form  method="post" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="login-form">
                                <div class="form-group">

                                    <div class="input-group"><span class="input-group-addon"><i class="icon s7-user"></i></span>
                                        <input  id="email" name="email" type="email" placeholder="Email" value="{{old('email')}}" autocomplete="off" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group"><span class="input-group-addon"><i class="icon s7-lock"></i></span>
                                        <input id="password" name="password"  type="password" placeholder="Password" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group login-submit">
                                    <button data-dismiss="modal" type="submit" class="btn btn-primary btn-lg">Log me in</button>
                                </div>
                                <div class="form-group footer row">
                                   {{-- <div class="col-xs-6"><a href="#">Forgot Password?</a></div>--}}
                                    <div class="col-xs-6 remember">
                                        <label for="remember">Remember Me</label>
                                        <div class="am-checkbox">
                                            <input type="checkbox" id="remember" value="1">
                                            <label for="remember"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset("client_assets/admin/lib/jquery/jquery.min.js")}}" type="text/javascript"></script>
<script src="{{ asset("client_assets/admin/lib/jquery.nanoscroller/javascripts/jquery.nanoscroller.min.js")}}" type="text/javascript"></script>
<script src="{{ asset("client_assets/admin/js/main.js")}}" type="text/javascript"></script>
<script src="{{ asset("client_assets/admin/lib/bootstrap/dist/js/bootstrap.min.js")}}" type="text/javascript"></script>
<script src="{{ asset("client_assets/admin/lib/theme-switcher/theme-switcher.min.js")}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        //initialize the javascript
        App.init();
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
<div class="ft_theme_switcher ocult">
    <div class="toggle"><i class="icon s7-settings"></i></div>
    <div class="desc">
        <h3>Theme Switcher</h3>
        <p>Select a color scheme. You can create your own color theme with less files.</p>
    </div>
    <div class="style_list">
        <div class="style">
            <div class="colors">
                <div style="background: #EF6262;" class="color"></div>
                <div style="background: #95d9f0;" class="color"></div>
                <div style="background: #ffdc7a;" class="color"></div>
                <div style="background: #7a98bf;" class="color"></div>
                <div style="background: #cccccc;" class="color"></div>
                <div class="name"> Default</div>
            </div><a href="pages-logind976.html?theme=default"></a>
        </div>
        <div class="style">
            <div class="colors">
                <div style="background: #7F64B5;" class="color"></div>
                <div style="background: #65CEEC;" class="color"></div>
                <div style="background: #ffdc7a;" class="color"></div>
                <div style="background: #45D8C2;" class="color"></div>
                <div style="background: #e0e0e0;" class="color"></div>
                <div class="name"> Twilight</div>
            </div><a href="pages-login056d.html?theme=twilight"></a>
        </div>
        <div class="style">
            <div class="colors">
                <div style="background: #4e91ff;" class="color"></div>
                <div style="background: #f55244;" class="color"></div>
                <div style="background: #FBBF22;" class="color"></div>
                <div style="background: #49AD70;" class="color"></div>
                <div style="background: #DFDFDF;" class="color"></div>
                <div class="name"> Google</div>
            </div><a href="pages-login421b.html?theme=google"></a>
        </div>
        <div class="style">
            <div class="colors">
                <div style="background: #f7c954;" class="color"></div>
                <div style="background: #88ca92;" class="color"></div>
                <div style="background: #7fcff5;" class="color"></div>
                <div style="background: #8B8CCC;" class="color"></div>
                <div style="background: #CCCCCC;" class="color"></div>
                <div class="name"> Sunrise</div>
            </div><a href="pages-logina494.html?theme=sunrise"></a>
        </div>
        <div class="style">
            <div class="colors">
                <div style="background: #6bc3b0;" class="color"></div>
                <div style="background: #FFE088;" class="color"></div>
                <div style="background: #bda5d7;" class="color"></div>
                <div style="background: #FF7FA0;" class="color"></div>
                <div style="background: #dfdfdf;" class="color"></div>
                <div class="name">Cake</div>
            </div><a href="pages-logine2f8.html?theme=cake"></a>
        </div>
    </div>
</div>
</body>
</html>