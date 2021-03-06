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
                    <div class="title"><b>@tlang('All Customers')</b></div>
                    <a href="{{ URL::to('admin/new_customer')}}">@tlang('Add New Customer')</a>
                    @if (count($customers) == 0)
                        <br><br><p>@tlang("You've not added any customers yet.")</p>
                    @else
                </div>
                <table id="customers" class="table table-striped table-hover table-fw-widget">
                    <thead>
                    <tr class="success">
                        <th>@tlang('Name')</th>
                        <th>@tlang('Email')</th>
                        <th>@tlang('Phone Number')</th>
                        <th>@tlang('Town/Province')</th>
                        <th>@tlang('Actions')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($customers as $c)
                        <tr>
                            <td>{{ $c->name}}</td>
                            <td>{{ $c->primary_email}}</td>
                            <td>{{ $c->primary_phone}}</td>
                            <td>{{ $c->town->name}}/{{ $c->town->state->name}}</td>
                            <td>
                                <a href="{{ URL::to('admin/customers/'.$c->id)}}" title="Edit"><i class="icon s7-expand2"></i></a>
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
        $("#customers").dataTable(
            {
                buttons:["copy","excel","pdf","print"],
                lengthMenu:[[10,25,50,100,-1],[10,25,50,100,"All"]],
                dom:"<'row am-datatable-header'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4 text-right'frt>><'row am-datatable-body'<'col-sm-12'tr>><'row am-datatable-footer'<'col-sm-5'i><'col-sm-7'p>>"
            });
    </script>
@endsection