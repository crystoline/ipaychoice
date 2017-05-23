
<div class="am-logo"></div>
<ul class="sidebar-elements">
    <li class="parent"><a href="#"><i class="icon s7-monitor"></i><span>Dashboard</span></a>
    </li>
    <li class="parent"><a href="#"><i class="icon s7-note2"></i><span>Invoices</span></a>
        <ul class="sub-menu">
            <li><a href="ui-general.html">All Invoices</a>
            </li>
            <li><a href="ui-alerts.html">New Invoice</a>
            </li>
        </ul>
    </li>
    <li class="parent"><a href="charts.html"><i class="icon s7-user"></i><span>Customers</span></a>
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
            <li><a href="ui-alerts.html">New Service</a>
            </li>
        </ul>
    </li>
    <li class="parent"><a href="charts.html"><i class="icon s7-map"></i><span>State&amp;Towns</span></a>
        <ul class="sub-menu">
            <li><a href="{{ URL::to('admin/states')}}">List All</a>
            </li>
            <li><a href="ui-alerts.html">Add New</a>
            </li>
        </ul>
    </li>
</ul>