@extends('client.admin.layouts.master')

@section('content')
    @php
        $date = $invoice['created_at'];
        $date = explode(' ',$date);
        $date = $date[0];
    @endphp
    <style type="text/css">
        .invoice-title h2, .invoice-title h1 {
            display: inline-block;
            padding: 0px 15px 0px 15px;
        }

        .table > tbody > tr > .no-line {
            border-top: none;
        }
        .table > tbody > tr > td {
            padding: 8px 10px;
            border: 0px;
        }
        .table > thead > tr > .no-line {
            border-bottom: none;
        }
        .table > tbody > tr > .thick-line {
            border-top: 2px solid;
        }

        .table { border:0px;}

    </style>
    <div class="row">
        <div class="col-sm-12">
            <div class="widget widget-fullwidth widget-small">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="invoice-title">
                            <h2>Invoice</h2><h2 class="pull-right"><b>{{Session::get('client.configuration')->client->name}}</b></h2>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <table class="table table-responsive table-condensed">
                                        <tr><td><strong>Billed to:</strong></td></tr>
                                        <tr><td>{{$invoice['customer']['name']}}</td></tr>
                                        <tr><td>{{$invoice['customer']['primary_email']}}</td></tr>
                                        <tr><td>{{$invoice['customer']['primary_phone']}}</td></tr>
                                        <tr><td>{{$invoice['customer']['town']['name']}} ,
                                                {{$invoice['customer']['town']['state']['name']}}.
                                            </td></tr>
                                    </table>
                                </div>
                                <div class="col-xs-2 text-right"></div>
                                <div class="col-xs-4 text-right">
                                    <table class="table table-responsive table-condensed">
                                        <tr><td> <strong>Invoice No:</strong></td><td class="text-left">{{$invoice['invoice_no']}}</td></tr>
                                        <tr><td><strong>Invoice Date</strong></td><td class="text-left">{{$date}}</td></tr>
                                        <tr><td><strong>Amount Due</strong></td><td class="text-left">{{$invoice['currency']['html'].round($invoice['amount'],2)}}</td></tr>
                                    </table>
                                    <br>    <br>   <br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Order summary</strong></h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-condensed">
                                        <thead>
                                        <tr>
                                            <td><strong>Item(s)</strong></td>
                                            <td class="text-right"><strong>Price</strong></td>
                                            <td class="text-right"><strong>Quantity</strong></td>
                                            <td class="text-right"><strong>Total</strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($invoice['invoice_items'] as $i)
                                            <tr>
                                                <td>{{$i['service']['name']}}</td>
                                                <td class="text-right">{{$invoice['currency']['html'].round($i['amount'],2)}}</td>
                                                <td class="text-right">{{$i['quantity']}}</td>
                                                <td class="text-right">{{$invoice['currency']['html'].round(($i['amount'] * $i['quantity']),2)}}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td class="thick-line"></td>
                                            <td class="thick-line"></td>
                                            <td class="thick-line text-right"><strong>Subtotal</strong></td>
                                            <td class="thick-line text-right">{{$invoice['currency']['html'].round($invoice['amount'],2)}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>{{$invoice['note']}}<br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection