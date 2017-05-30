@extends('client.admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3><b>@lang('Add New Customer')</b></h3>
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="panel-body">
                    <form action="" method="post" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('Customer Name')<span class='text-danger'>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Name of the Customer" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('Primary Contact Name')<span class='text-danger'>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" placeholder="Primary Contact Name" value="{{old('primary_contact_name')}}" name="primary_contact_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('Primary Email')<span class='text-danger'>*</span></label>
                            <div class="col-sm-6">
                                <input type="email" placeholder="Customer Primary Email" value="{{old('primary_email')}}" name="primary_email" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('Primary Phone Number')<span class='text-danger'>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" placeholder="Customer Primary Phone Number" value="{{old('primary_phone')}}" name="primary_phone" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('Secondary Contact Name')</label>
                            <div class="col-sm-6">
                                <input type="text" placeholder="Secondary Contact Name" value="{{old('secondary_contact_name')}}" name="secondary_contact_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('Secondary Email')</label>
                            <div class="col-sm-6">
                                <input type="email" placeholder="Customer Secondary Email" name="secondary_email" value="{{old('secondary_email')}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('Secondary Phone Number')</label>
                            <div class="col-sm-6">
                                <input type="text" placeholder="Customer Secondary Phone Number" value="{{old('secondary_phone_number')}}" name="secondary_phone_number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('Town')<span class='text-danger'>*</span></label>
                            <div class="col-sm-6">
                                <select class="form-control" name="town" required>
                                    <option value="">@lang('Select Town')</option>
                                    @foreach ($towns as $t)
                                        <option value="{{$t->id}}" {{ (old("town") == $t->id ? "selected":"") }} >{{$t->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br><br>
                        <div class="spacer text-center">
                            <button type="submit" class="btn btn-space btn-primary">@lang('Submit')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection