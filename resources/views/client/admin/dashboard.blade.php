@extends('client.admin.layouts.master')
<!--+general-chart("classes", "title", "height", "id", "counter value", "counter desc", tools enabled (use true or false))-->
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('client_assets/admin/lib/morrisjs/morris.css')}}"/>
@endsection
@php
    $x =40;
@endphp
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="widget widget-pie">
                <div class="widget-head"><span class="title">Invoices</span></div>
                <div class="row chart-container">
                    <div class="col-md-6">
                        <div id="inv_chart" class="chart"></div><div id="test"></div>

                    </div>
                    <div class="col-md-6">
                        <div class="legend"></div>
                    </div>
                </div>
                <div class="row chart-info">
                    <div class="col-xs-4"><span class="title">Total Paid Invoices</span><span data-toggle="counter" data-end="{{$data['total_paid']}}" class="number">0</span></div>
                    <div class="col-xs-4"><span class="title">Total Pending Invoices</span><span data-toggle="counter" data-end="{{$data['total_pend']}}" class="number">0</span></div>
                    <div class="col-xs-4"><span class="title">Total Invoices Created</span><span data-toggle="counter" data-end="{{$data['total_inv']}}" class="number">0</span></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="widget widget-pie">
                <div class="widget-head"><span class="title">Invoices</span></div>
                <div class="row chart-container">
                    <div class="col-md-6">
                        <div id="inv_chart2" class="chart2"></div>

                    </div>
                    <div class="col-md-6">
                        <div class="legend"></div>
                    </div>
                </div>
                <div class="row chart-info">
                    <div class="col-xs-4"><span class="title">Total Paid Invoices</span><span data-toggle="counter" data-end="{{$data['total_paid']}}" class="number">0</span></div>
                    <div class="col-xs-4"><span class="title">Total Pending Invoices</span><span data-toggle="counter" data-end="{{$data['total_pend']}}" class="number">0</span></div>
                    <div class="col-xs-4"><span class="title">Total Invoices Created</span><span data-toggle="counter" data-end="{{$data['total_inv']}}" class="number">0</span></div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <a href="admin/new_invoice">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-full-alt3">
                    <div class="panel-body text-center success"><br>
                        <h2> Hello, {{$data['officer']}}. Create an Invoice Now! </h2><br>
                    </div>
                </div>
            </div>
        </div>
    </a>

@endsection

@section('javascript')
    <script src="{{ asset('client_assets/admin/lib/jquery-flot/jquery.flot.js')}}" type="text/javascript"></script>
    <script src="{{ asset('client_assets/admin/lib/jquery-flot/jquery.flot.pie.js')}}" type="text/javascript"></script>
    <script src="{{ asset('client_assets/admin/lib/jquery-flot/jquery.flot.resize.js')}}" type="text/javascript"></script>
    <script src="{{ asset('client_assets/admin/lib/countup/countUp.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('client_assets/admin/lib/chartjs/Chart.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('client_assets/admin/lib/raphael/raphael-min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('client_assets/admin/lib/morrisjs/morris.min.js')}}" type="text/javascript"></script>


    <script type="text/javascript">
        $(document).ready(function(){
            //initialize the javascript
            App.init();

            App.dashboard();
        });
    </script>

    @php
        if ($data['total_paid'] > 0) {
           echo '<script type="text/javascript">
               function b(){
                   var a=[
                           {label:"Paid Invoices",data:'.$data['total_paid'].'},
                           {label:"Unpaid Invoices",data:'.$data['total_pend'].'}],
                       b=tinycolor("#7accbe").lighten(5).toString(),
                       c="#ef6262",
                       d=App.color.alt1,
                       e=$("#inv_chart").parent().next().find(".legend");
                   $.plot("#inv_chart",a,{series:{pie:{show:!0,highlight:{opacity:.1}}},grid:{hoverable:!0},legend:{container:e},colors:[b,c,d]})
               }
               b()
           </script>';
        } else{
        echo '<script type="text/javascript">
               function b(){
                   var a=[
                           {label:"Paid Invoices",data:0},
                           {label:"Unpaid Invoices",data:1}],
                       b=tinycolor("#7accbe").lighten(5).toString(),
                       c="#ef6262",
                       d=App.color.alt1,
                       e=$("#inv_chart").parent().next().find(".legend");
                   $.plot("#inv_chart",a,{series:{pie:{show:!0,highlight:{opacity:.1}}},grid:{hoverable:!0},legend:{container:e},colors:[b,c,d]})
               }
               b()
           </script>';
        }
    @endphp
@endsection