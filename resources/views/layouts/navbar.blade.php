<nav class="navbar navbar-primary navbar-trans navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Logo -->
            <a class="navbar-brand" href="{{ url('')}}">
                {{ env('APP_NAME') }}
                {{--<img class="navbar-logo" src="assets/images/logo.png" alt="Logo">--}}
            </a>
        </div><!-- / .navbar-header -->

        <!-- Navbar Links -->
        <div id="navbar" class="navbar-collapse collapse" >
            <ul class="nav navbar-nav" id="mainnav" >
                <li><a href="{{url('')}}#" >Home</a></li><!-- / Home -->
                @if (Auth::check())
                <!-- Home -->
                <li><a href="{{url('home')}}">My Clients</a> </li>
                @else
                    <li><a href="{{url('')}}#features" >Feature</a></li><!-- / Home -->
                @endif


            </ul><!-- / .nav .navbar-nav -->


            <!-- Navbar Links Right -->
            <ul class="nav navbar-nav navbar-right">

                @if (Auth::check())
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @else
                    <li> <a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @endif
            </ul><!-- / .nav .navbar-nav .navbar-right -->

        </div><!--/.navbar-collapse -->
    </div><!-- / .container -->
</nav><!-- / .navbar -->
<div style="margin-top: 70px">

</div>