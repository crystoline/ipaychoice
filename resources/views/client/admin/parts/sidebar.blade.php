
<div class="am-logo"></div>
<ul class="sidebar-elements">
    <li class="parent"><a href="{{ URL::to('admin')}}"><i class="icon s7-monitor"></i><span>Dashboard</span></a>
    </li>
    <li class="parent"><a href="#"><i class="icon s7-note2"></i><span>Invoices</span></a>
        <ul class="sub-menu">
            <li><a href="{{ URL::to('admin/invoices')}}">All Invoices</a>
            </li>
            <li><a href="{{ URL::to('admin/new_invoice')}}">New Invoice</a>
            </li>
        </ul>
    </li>
    <li class="parent"><a href="#"><i class="icon s7-user"></i><span>Customers</span></a>
        <ul class="sub-menu">
            <li><a href="{{ URL::to('admin/customers')}}">All Customers</a>
            </li>
            <li><a href="{{ URL::to('admin/new_customer')}}">New Customer</a>
            </li>
        </ul>
    </li>
    <li class="parent"><a href="#"><i class="icon s7-tools"></i><span>Services</span></a>
        <ul class="sub-menu">
            <li><a href="{{ URL::to('admin/services')}}">All Services</a>
            </li>
            <li><a href="{{ URL::to('admin/new_service')}}">New Service</a>
            </li>
        </ul>
    </li>
    <li class="parent"><a href="#"><i class="icon s7-id"></i><span>Cash Officers</span></a>
        <ul class="sub-menu">
            <li><a href="{{ URL::to('admin/officers')}}">All Cash Officers</a>
            </li>
            <li><a href="{{ URL::to('admin/new_officer')}}">New Cash Officer</a>
            </li>
        </ul>
    </li>
    {{--<li class="parent"><a href="#"><i class="icon s7-news-paper"></i><span>Reports</span></a>--}}
        {{--<ul class="sub-menu">--}}
            {{--<li><a href="{{ URL::to('admin/services')}}">All Services</a>--}}
            {{--</li>--}}
            {{--<li><a href="{{ URL::to('admin/new_service')}}">New Service</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</li>--}}
</ul>