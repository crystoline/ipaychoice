@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div style="sdisplay: none" class="row ws-m">
            <div class="col-md-3 col-sm-1">
                <div class="navbar navbar-default navbar-fixed-side" style="padding-left: 5px">
                    <h5>{{$client->name}}</h5>
                   <ul class="nav navbar-nav">
                       <li><a href=""><span class="fa fa-home"></span>  Dashboard</a> </li>
                       <li class="divider"></li>
                       <li><a href="{{route('user.client.dashboard.officers', ['client'=>$client->id])}}" data-ajax="true"><i class="fa fa-user-secret" style=""></i>  Cash Officers</a> </li>
                       <li class="divider"></li>
                       <li><a href="{{route('user.client.dashboard.customers', ['client'=>$client->id])}}" data-ajax="true"><i class="fa fa-users"></i>  Customers</a> </li>
                       <li class="divider"></li>
                       <li><a href="{{route('user.client.dashboard.services', ['client'=>$client->id])}}" data-ajax="true"><i class="fa fa-cogs"></i>  Services</a> </li>
                       <li class="divider"></li>
                       <li><a href="{{route('user.client.dashboard.invoices', ['client'=>$client->id])}}" data-ajax="true"><i class="fa fa-list"></i>  Invoices</a> </li>
                       <li class="divider"></li>
                       <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i> Setting <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                               <li><a href="{{route('user.client.dashboard.states', ['client'=>$client->id])}}" data-ajax="true">@lang('States/Cities')</a></li>
                           </ul>
                       </li>
                   </ul>
                </div>

            </div>
            <div class="col-md-9 col-sm-10" id="content">
                my content
            </div>
        </div>
    </div>
@endsection

@section('stylesheets')
<link rel="stylesheet" href="{{asset('css/navbar-fixed-side.min.css')}}" >
    <style>
        .navbar-fixed-side .fa{
            font-size: 18px
        }
    </style>
@endsection
@section('javascript')
<script>
    var navigate_base_url = '{{route('user.client.dashboard', ['client'=>$client->id])}}';

</script>
<script>
    $(document).ready(function () {
        loader()
        $(document)
            .ajaxComplete(function () {
                loader()
            });;


    });
    function loader(){
        $(document)
                .ajaxStart(function () {
                    $('.preloader').show();
                    $('.preloader img').show();
                })
                .ajaxStop(function () {
                    $('.preloader img').fadeOut(); // will first fade out the loading animation
                    $('.preloader').delay(350).fadeOut('slow', function() {

                    });
                })
    }

</script>
@endsection