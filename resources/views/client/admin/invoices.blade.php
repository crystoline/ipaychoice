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
                        <th>@lang('Action')</th>
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
                                <a href="{{ URL::to('admin/invoices/'.$invoice->id)}}"><i class="icon s7-next-2"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        $("#invoices").dataTable(
            {
                "order": [[ 6, "desc" ]],
                buttons:["copy","excel","pdf","print"],
                lengthMenu:[[10,25,50,100,-1],[10,25,50,100,"All"]],
                dom:"<'row am-datatable-header'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4 text-right'frt>><'row am-datatable-body'<'col-sm-12'tr>><'row am-datatable-footer'<'col-sm-5'i><'col-sm-7'p>>"
            });
    </script>
@endsection