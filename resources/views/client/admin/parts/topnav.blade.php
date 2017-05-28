<div class="container-fluid">
    <div class="navbar-header">
        <div class="page-title"><span>Dashboard</span></div><a href="#" class="am-toggle-left-sidebar navbar-toggle collapsed"><span class="icon-bar"><span></span><span></span><span></span></span></a><a href="#" class="navbar-brand"></a>
    </div>

    <!-- <a href="#" class="am-toggle-right-sidebar"><span class="icon s7-menu2"></span></a><a href="#" data-toggle="collapse" data-target="#am-navbar-collapse" class="am-toggle-top-header-menu collapsed"><span class="icon s7-angle-down"></span></a> -->

    <div id="am-navbar-collapse" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right am-user-nav">
            <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle">
            {{Session::get('client_admin_officer')->first_name.' '.Session::get('client_admin_officer')->last_name}}<span class="angle-down s7-angle-down"></span></a>
                <ul role="menu" class="dropdown-menu">
                    {{--<li><a href="#"> <span class="icon s7-user"></span>My profile</a></li>--}}
                    <li><a href="{{action('Client\Admin\AuthenticateController@logout')}}"> <span class="icon s7-power"></span>Sign Out</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav am-nav-right">
            <li style="margin-top: 10px"><a><h2>{{Session::get('client.configuration')->client->name}}</h2></a></li>
        </ul>

    </div>
    
</div>