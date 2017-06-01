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
                    <div class="title"><b>@lang('All Cash Officers')</b></div>
                    <a href="{{ URL::to('admin/new_officer')}}">@lang('Add New Cash Officer')</a>
                    @if (count($officers) == 0)
                        <br><br><p>You've not added any cash officers yet.</p>
                    @else
                </div>
                <table id="officers" class="table table-striped table-hover table-fw-widget">
                    <thead>
                    <tr class="success">
                        <th>@lang('Name')</th>
                        <th>@lang('Email')</th>
                        <th>@lang('Date Created')</th>
                        <th>@lang('Action')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($officers as $officer)
                        <tr>
                            <td style="text-transform: capitalize">{{$officer->first_name.' '.$officer->last_name}}</td>
                            <td>{{$officer->email}}</td>
                            <td style="text-transform: capitalize">{{$officer->created_at}}</td>
                            <td>
                                <a href="{{ URL::to('admin/officers/'.$officer->id)}}" title="Edit"><i class="icon s7-expand2"></i></a>
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
        $("#officers").dataTable(
            {
                buttons:["copy","excel","pdf","print"],
                lengthMenu:[[10,25,50,100,-1],[10,25,50,100,"All"]],
                dom:"<'row am-datatable-header'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4 text-right'frt>><'row am-datatable-body'<'col-sm-12'tr>><'row am-datatable-footer'<'col-sm-5'i><'col-sm-7'p>>"
            });
    </script>
@endsection