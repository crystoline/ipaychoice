@extends('layouts.dashboard')

@section('content')
    <p>&nbsp;</p>
    <div class="container-fluid">
        <div class="row ws-m">
            <div class="col-md-12" id="content" style="min-height: 400px">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card-box widget-box-one">
                            <div class="wigdet-one-content">

                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow">@tlang("Customers")</p>
                                <h2 class="text-success"><span data-plugin="counterup">{{count(\App\Models\Clients\Customer::get())}}</span></h2>
                                <p class="text-muted m-0"><b>@tlang("Today"): </b>{{count(\App\Models\Clients\Customer::whereDate('created_at', '>=', \Carbon\Carbon::today()->toDateString() )->get())}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card-box widget-box-one">
                            <div class="wigdet-one-content">
                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow">@tlang("Cash Officers")</p>
                                <h2 class="text-info"><span data-plugin="counterup">{{count(\App\Models\Clients\Officer::get())}}</span></h2>
                                <p class="text-muted m-0"><b>@tlang("Today"):</b> {{count(\App\Models\Clients\Officer::whereDate('created_at', '>=', \Carbon\Carbon::today()->toDateString() )->get())}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card-box widget-box-one">
                            <div class="wigdet-one-content">
                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow">@tlang("Total Invoices")</p>
                                <h2 class="text-warning"><span data-plugin="counterup">{{count(\App\Models\Clients\Invoice::get())}}</span></h2>
                                <p class="text-muted m-0"><b>@tlang("Today"):</b> {{count(\App\Models\Clients\Invoice::whereDate('created_at', '>=', \Carbon\Carbon::today()->toDateString() )->get())}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card-box widget-box-one">
                            <div class="wigdet-one-content">
                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow">@tlang("Total Paid")</p>
                                <h2 class="text-primary"><span data-plugin="counterup">{{count(\App\Models\Clients\Invoice::where(['status' => '1'])->get())}}</span></h2>
                                <p class="text-muted m-0"><b>@tlang("Today"):</b> {{count(\App\Models\Clients\Invoice::where(['status' => '1'])->whereDate('created_at', '>=', \Carbon\Carbon::today()->toDateString() )->get())}}</p>
                            </div>
                        </div>
                    </div>
                </div>
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
        .preloader_trans{
            opacity: 0.7!important;
            filter: alpha(opacity=70) !important;
        }
        .navbar-nav li {
            //padding: 7px;
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
                    //$('#preloader').addClass('preloader_trans').show();
                    $('#preloader, #preloader #status').addClass('preloader_trans').show();
                })
                .ajaxStop(function () {
                    //$('#preloader #status').fadeOut(); // will first fade out the loading animation
                    $('#preloader, #preloader #status').delay(350).fadeOut('slow', function() {
                        $('#preloader, #preloader #status').removeClass('preloader_trans')
                    });
                })
    }

</script>
@endsection