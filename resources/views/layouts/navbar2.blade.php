<!--Navbar-->
<nav class="navbar fixed-top navbar-toggleable-md navbar-dark scrolling-navbar">

    <div class="container">

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="{{ url('')}}">
            <strong>{{ env('APP_NAME') }}</strong>
        </a>

        <div class="collapse navbar-collapse" id="navbarNav">

            <!--Links-->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('')}}#">Home</a>
                </li>
                @if (Auth::check())
                        <!-- Home -->
                    <li class="nav-item"><a class="nav-link" href="{{url('home')}}">My Clients</a> </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{url('')}}#features" >Feature</a></li><!-- / Home -->
                @endif


            </ul>
            <!-- Navbar Links Right -->
            <ul class="nav navbar-nav navbar-right">

                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @else
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Register</a></li>
                @endif
            </ul><!-- / .nav .navbar-nav .navbar-right -->

            <!--Social Icons-->
            <ul class="navbar-nav nav-flex-icons">
                <li class="nav-item">
                    <a class="nav-link"><i class="fa fa-facebook"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"><i class="fa fa-twitter"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"><i class="fa fa-instagram"></i></a>
                </li>
            </ul>

        </div>
    </div>
</nav>
<!--/Navbar-->
