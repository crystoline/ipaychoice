@extends('client.admin.layouts.master')

@section('content')
@php
    foreach ($invoice as $k=>$j) {
        dd($k.$j);
}
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
            @php
                foreach ($invoice as $k=>$j) {

            }
            @endphp
            <div class="widget widget-fullwidth widget-small">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="invoice-title">
                            <h2>Invoice</h2><h1 class="pull-right"><b>INNOVEXI</b></h1>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <table class="table table-responsive table-condensed">
                                        <tr><td><strong>Billed to:</strong></td></tr>
                                        <tr><td id="cust_cont"></td></tr>
                                        <tr><td><strong>document.getElementById("cust_email").value</strong></td></tr>
                                        <tr><td><strong>document.getElementById("cust_phone").value</strong></td></tr>
                                    </table>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <table class="table table-responsive table-condensed">
                                        <tr><td> <strong>Invoice No:</strong></td><td class="text-left"><script>document.getElementById("customer").value</script></td></tr>
                                        <tr><td><strong>Invoice Date</strong></td><td class="text-left">{{date('d-m-Y')}}</td></tr>
                                        <tr><td><strong>Amount Due</strong></td><td class="text-left"><script>getTotal()</script></td></tr>
                                    </table>



                                    <br>


                                    <br>

                                    <br><br>
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
                                            <td class="text-right"><strong>Totals</strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- foreach (₦order->lineItems as ₦line) or some such thing here -->
                                        <tr>
                                            <td>Monkey Tail</td>
                                            <td class="text-right">₦10.99</td>
                                            <td class="text-right">1</td>
                                            <td class="text-right">₦10.99</td>
                                        </tr>
                                        <tr>
                                            <td>Alomo Bitters</td>
                                            <td class="text-right">₦20.00</td>
                                            <td class="text-right">3</td>
                                            <td class="text-right">₦60.00</td>
                                        </tr>
                                        <tr>
                                            <td>Skunk</td>
                                            <td class="text-right">₦600.00</td>
                                            <td class="text-right">1</td>
                                            <td class="text-right">₦600.00</td>
                                        </tr>
                                        <tr>
                                            <td class="thick-line"></td>
                                            <td class="thick-line"></td>
                                            <td class="thick-line text-right"><strong>Subtotal</strong></td>
                                            <td class="thick-line text-right">₦670.99</td>
                                        </tr>
                                        <tr>
                                            <td class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line text-right"><strong>Total</strong></td>
                                            <td class="no-line text-right">₦685.99</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>Note: jhwhfwuiehfwuifhiw<br><br>
                            </div>
                        </div>
                    </div>
                </div></div></div>
@endsection