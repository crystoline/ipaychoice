@extends('layouts.master')
        <!--+general-chart("classes", "title", "height", "id", "counter value", "counter desc", tools enabled (use true or false))-->

@section('content')
        <!-- ========== Hero Cover ========== -->
<main>

    <div class="container">
    </div>

</main>
<div id="home" class="animated-hero" style="margin-top: -70px">
    <div class="bg-overlay">

        <!-- Hero Content -->
        <div class="hero-content-wrapper">
            <div class="hero-content">

                <h1 class="cd-headline slide hero-lead wow fadeIn" data-wow-duration="4s">
                  <span class="cd-words-wrapper">
                    <b class="is-visible">Creativity</b>
                    <b>Invoiced</b>
                    <b>Get Paid</b>
                  </span>
                </h1>
                <h4 class="h-alt hero-subheading wow fadeIn" data-wow-duration="2s" data-wow-delay=".7s">Get started</h4>
                <a href="{{url('register')}}" class="btn btn-light wow fadeIn" data-wow-duration="2s" data-wow-delay="1s">Sign up Now</a> or
                <a href="{{url('login')}}" class="btn btn-light wow fadeIn" data-wow-duration="2s" data-wow-delay="1s">Sign in</a>

            </div>
        </div>

        <!-- Scroller -->
        <a href="#about" class="scroller">
            <span class="scroller-text">scroll down</span>
            <span class="linea-basic-magic-mouse"></span>
        </a>

    </div><!-- / .bg-overlay -->
</div><!-- / .animated-hero -->
@endsection
{{--
<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
--}}
