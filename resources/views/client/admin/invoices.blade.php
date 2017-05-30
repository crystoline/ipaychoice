@extends('client.admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="widget widget-fullwidth widget-small">
                <div class="widget-head">
                    @if (Session::has('status'))
                        <div class="alert alert-success">
                            <p>{{ Session::get('status') }}</p>
                        </div>
                    @endif
                    <div class="title"><b>@lang('All Invoices')</b></div>
                    <a href="{{ URL::to('admin/new_invoice')}}">@lang('Add New Invoice')</a>
                    @if (count($invoices) == 0)
                        <br><br><p>You've not added any invoice yet.</p>
                    @else
                </div>
                <div role="alert" class="alert alert-success alert-dismissible" id="alert" style="display: none">
                    <button type="button" data-dismiss="alert" aria-label="Close" class="close">
                        <span aria-hidden="true" class="s7-close"></span></button>

                </div>
                <form style="border-radius: 0px;" class="form-horizontal group-border-dashed">
                    <div class="form-group">
                        <div class="col-sm-7"></div>
                        <label class="col-sm-2 control-label">@lang('Filter by Status')</label>
                        <div class="col-sm-3">
                            <select class="form-control input-sm" id="status" style="margin-top: 5px;">
                                <option value="" selected>--All Invoice Status--</option>
                                <option value='Pending'>Pending</option>
                                <option value='Paid'>Paid</option>
                            </select>
                        </div>
                    </div>
                </form>

                <table id="invoices" class="table table-striped table-hover table-fw-widget">
                    <thead>
                    <tr class="success">
                        <th>@lang('Customer')</th>
                        <th>@lang('Invoice No.')</th>
                        <th>@lang('Total Amount')</th>
                        <th>@lang('Cash Officer')</th>
                        <th>@lang('Location')</th>
                        <th>@lang('Status')</th>
                        <th>@lang('Date Created')</th>
                        <th>@lang('Actions')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($invoices as $invoice)
                        <tr>
                            <td>{{$invoice->customer->name}}</td>
                            <td>{{$invoice->invoice_no}}</td>
                            <td>{{$invoice->currency->html.number_format($invoice->amount,2)}}</td>
                            <td>{{$invoice->officer->first_name.' '. $invoice->officer->last_name}}</td>
                            <td>{{$invoice->customer->town->name}}</td>
                            @php
                                echo ($invoice->status == 0)? "<td><span class='label label-danger'>Pending</span></td>":"<td><span class='label label-success'>Paid</span></td>";
                            @endphp
                            <td>{{$invoice->created_at}}</td>
                            <td>
                                <a href="{{ URL::to('admin/invoices/'.$invoice->id)}}" class="badge badge-warning">View</a>
                                <a href="javascript:void(0);" id="send" class="badge badge-info" onclick="send_invoice({{$invoice->id}})">Send</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div><div id="loader" style="display: none"><img src="{{ asset('client_assets/admin/img/loading.gif')}}"></div>

@endsection
@section('javascript')
    <script>
        var table = $("#invoices").dataTable(
            {
                "order": [[ 6, "desc" ]],
                buttons:["copy","excel","pdf","print"],
                lengthMenu:[[10,25,50,100,-1],[10,25,50,100,"All"]],
                dom:"<'row am-datatable-header'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4 text-right'frt>><'row am-datatable-body'<'col-sm-12'tr>><'row am-datatable-footer'<'col-sm-5'i><'col-sm-7'p>>"
            });

        function send_invoice(id) {
            document.getElementById("alert").innerHTML = document.getElementById("loader").innerHTML+' Sending';
            document.getElementById("alert").style.display = 'block';
            $.ajax({
            method: 'GET',
                url: '/admin/ajax_send_invoice',
                data: {'id': id},
                success: function (response) {
                    document.getElementById("alert").innerHTML = 'Invoice successfully sent to customer';
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            })
        }

        $("#status").on('change', function(){
            var v = $(this).val();
            table
                .api().columns(5)
                .search(v)
                .draw();
        });
    </script>


@endsection