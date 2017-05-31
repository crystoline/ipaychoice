
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
                              <!--   <div class="form-group footer row">
                                   {{-- <div class="col-xs-6"><a href="#">Forgot Password?</a></div>--}}
                                    <div class="col-xs-6 remember">
                                        <label for="remember">Remember Me</label>
                                        <div class="am-checkbox">
                                            <input type="checkbox" id="remember" value="1">
                                            <label for="remember"></label>
                                        </div>
                                    </div>
                                </div> -->
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
</body>
</html>