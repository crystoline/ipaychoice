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
                    <div class="title"><b>@lang('All Services')</b></div>
                    <a href="{{ URL::to('admin/new_service')}}">@lang('Add New Service')</a>
                    @if (count($services) == 0)
                        <br><br><p>You've not added any services yet.</p>
                    @else
                </div>
                <table id="services" class="table table-striped table-hover table-fw-widget">
                    <thead>
                    <tr class="success">
                        <th>@lang('Service')</th>
                        <th>@lang('Price')</th>
                        <th>@lang('Description')</th>
                        <th>@lang('Action')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($services as $service)
                        <tr>
                            <td style="text-transform: capitalize">{{$service->name}}</td>
                            <td>{{$service->price}}</td>
                            <td style="text-transform: capitalize">{{$service->description}}</td>
                            <td>
                                <a href="{{ URL::to('admin/services/'.$service->id)}}" title="Edit"><i class="icon s7-expand2"></i></a>
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
        $("#services").dataTable(
            {
                buttons:["copy","excel","pdf","print"],
                lengthMenu:[[10,25,50,100,-1],[10,25,50,100,"All"]],
                dom:"<'row am-datatable-header'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4 text-right'frt>><'row am-datatable-body'<'col-sm-12'tr>><'row am-datatable-footer'<'col-sm-5'i><'col-sm-7'p>>"
            });
    </script>
@endsection