@php
        $date = $invoice['created_at'];
        $date = explode(' ',$date);
        $date = $date[0];

        $date_due = $invoice['invoice_due_date'];
        $date_due = explode(' ',$date_due);
        $date_due = $date_due[0];
@endphp

<html>
<head>

    <link rel="stylesheet" type="text/css" href="{{ asset('client_assets/admin/lib/stroke-7/style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('client_assets/admin/lib/jquery.nanoscroller/css/nanoscroller.css')}}"/>

    <link type="text/css" href="{{ asset('client_assets/admin/css/style.css')}}" rel="stylesheet">

    <link type="text/css" href="{{ asset('client_assets/admin/css/themes/theme-google.css')}}" rel="stylesheet">
    <script src="{{ asset('client_assets/admin/lib/jquery/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('client_assets/admin/lib/jquery.nanoscroller/javascripts/jquery.nanoscroller.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('client_assets/admin/js/main.js')}}" type="text/javascript"></script>
    <script src="{{ asset('client_assets/admin/lib/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('client_assets/admin/js/pdfmake.min.js')}}"></script>
    <script src="{{ asset('client_assets/admin/js/vfs_fonts.js')}}"></script>

    <style type="text/css">
        .am-wrapper {
            min-height: 100%;
            padding-top: 30px;
            margin: 0px 100px;
        }
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
    </style>
</head>

<body>
<div class=" text-center">
<button type="button" class=" text-center btn btn-space btn-primary btn-rounded" onclick="window.print()"><i class="icon icon-left s7-print"></i> Print</button>
    {{--<button type="button" class=" text-center btn btn-space btn-primary btn-rounded" id="download"><i class="icon icon-left s7-cloud-download"></i>Download PDF</button>--}}
</div>
<div class="am-wrapper">

    <div class="row">
        <div class="col-sm-12">
            <div class="widget widget-fullwidth widget-small">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="invoice-title">
                            <h2>Invoice</h2><h2 class="pull-right"><b>{{$client}}</b></h2>
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
                                        <tr><td><strong>Invoice Date:</strong></td><td class="text-left">{{$date}}</td></tr>
                                        <tr><td><strong>Due Date:</strong></td><td class="text-left">{{$date_due}}</td></tr>
                                        <tr><td><strong>Amount Due:</strong></td><td class="text-left">{{$invoice['currency']['html'].number_format($invoice['amount'],2)}}</td></tr>
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
                                                <td class="text-right">{{$invoice['currency']['html'].number_format($i['amount'],2)}}</td>
                                                <td class="text-right">{{$i['quantity']}}</td>
                                                <td class="text-right">{{$invoice['currency']['html'].number_format(($i['amount'] * $i['quantity']),2)}}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td class="thick-line"></td>
                                            <td class="thick-line"></td>
                                            <td class="thick-line text-right"><strong>Subtotal</strong></td>
                                            <td class="thick-line text-right">{{$invoice['currency']['html'].number_format($invoice['amount'],2)}}</td>
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
</div>
<script >
    $('#download').click(function() {
        htmlToPdfMake('.am-wrapper');
    });

    function htmlToPdfMake(elementID)
    {
        var fullText = "";
        var x = $(elementID).children();
        $.each(x, function(index, value) {
            fullText+=$(this).context.innerText + "\n\n";
        });

        var dd = {
            content: [
                "INVOICE DETAILS\n\n\n"+fullText
            ]
        };
        pdfMake.createPdf(dd).download('Invoice.pdf');
    }
</script>
</body>
</html>