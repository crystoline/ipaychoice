@extends('client.admin.layouts.master')
<!--+general-chart("classes", "title", "height", "id", "counter value", "counter desc", tools enabled (use true or false))-->
@section('stylesheets')

@endsection
@php
    $x =40;
@endphp
@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="widget widget-pie">
                <div class="widget-head"><span class="title">Invoices</span></div>
                <div class="row chart-container">
                    <div class="col-md-6">
                        <div id="inv_chart" class="chart"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="legend"></div>
                    </div>
                </div>
                <div class="row chart-info">
                    <div class="col-xs-4"><span class="title">Total Paid Invoices</span><span data-toggle="counter" data-end="180" class="number">0</span></div>
                    <div class="col-xs-4"><span class="title">Total Unpaid Invoices</span><span data-toggle="counter" data-end="500" data-prefix="$" class="number">$0</span></div>
                    <div class="col-xs-4"><span class="title">Total Invoices Created</span><span data-toggle="counter" data-end="90" class="number">0</span></div>
                </div>
            </div>
        </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-6">
                        <div class="widget widget-tile">
                            <div class="data-info">
                                <div data-toggle="counter" data-end="18.6" data-decimals="1" data-suffix="%" class="value">0%</div>
                                <div class="desc">Amount Due</div>
                            </div>
                            <div class="icon"><span class="s7-cash"></span></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="widget widget-tile">
                            <div class="data-info">
                                <div data-toggle="counter" data-end="33" data-suffix="%" class="value">0%</div>
                                <div class="desc">Amount Received</div>
                            </div>
                            <div class="icon"><span class="s7-cash"></span></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="widget widget-tile">
                            <div class="data-info">
                                <div data-toggle="counter" data-end="156" class="value">0</div>
                                <div class="desc">Total Customers</div>
                            </div>
                            <div class="icon"><span class="s7-users"></span></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="widget widget-tile">
                            <div class="data-info">
                                <div data-toggle="counter" data-decimals="1" data-end="7.5" data-suffix="K" class="value">0</div>
                                <div class="desc">Total Services</div>
                            </div>
                            <div class="icon"><span class="s7-tools"></span></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget widget-tile widget-tile-wide">
                            <div class="tile-info">
                                <div class="icon"><span class="s7-cash"></span></div>
                                <div class="data-info">
                                    <div class="title">Total Invoiced</div>
                                    <div class="desc">Since Inception</div>
                                </div>
                            </div>
                            <div class="tile-value"><span data-toggle="counter" data-decimals="2" data-end="28458" data-prefix="$">$0</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('javascript')

    <script type="text/javascript">
        $(document).ready(function(){
            //initialize the javascript
            App.init();
        App.dashboard();
        });
    </script>

    <script src="{{ asset('client_assets/admin/lib/jquery-flot/jquery.flot.js')}}" type="text/javascript"></script>
    <script src="{{ asset('client_assets/admin/lib/jquery-flot/jquery.flot.pie.js')}}" type="text/javascript"></script>
    <script src="{{ asset('client_assets/admin/lib/jquery-flot/jquery.flot.resize.js')}}" type="text/javascript"></script>
    <script src="{{ asset('client_assets/admin/lib/countup/countUp.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('client_assets/admin/lib/chartjs/Chart.min.js')}}" type="text/javascript"></script>

    @php
    echo '<script type="text/javascript">
        function b(){
            var a=[
                    {label:"Paid Invoices",data:0},
                    {label:"Unpaid Invoices",data:'.$x.'}],
                b=tinycolor("#7accbe").lighten(5).toString(),
                c="#ef6262",
                d=App.color.alt1,
                e=$("#inv_chart").parent().next().find(".legend");
            $.plot("#inv_chart",a,{series:{pie:{show:!0,highlight:{opacity:.1}}},grid:{hoverable:!0},legend:{container:e},colors:[b,c,d]})
        }
        b()
    </script>';
    @endphp
@endsection