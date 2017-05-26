@extends('client.admin.layouts.master')

@section('content')
    @php
    $email = ($email == '')? $email : $email[0]['email'];
    $phone = ($phone == '')? $phone : $phone[0]['telephone'];
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3><b>@lang('Edit Customer')</b></h3>
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
                        <input type="hidden" name="_method" value="put">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('Customer Name')<span class='text-danger'>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="name" value="{{old('name')? old('name'):$customer->name}}" placeholder="Name of the Customer" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('Primary Email')<span class='text-danger'>*</span></label>
                            <div class="col-sm-6">
                                <input type="email" placeholder="Customer Primary Email" value="{{old('primary_email')? old('primary_email'):$customer->primary_email}}" name="primary_email" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('Secondary Email')</label>
                            <div class="col-sm-6">
                                <input type="email" placeholder="Customer Secondary Email" name="secondary_email" value="{{old('secondary_email')? old('secondary_email'): $email}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('Primary Phone Number')<span class='text-danger'>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" placeholder="Customer Primary Phone Number" value="{{old('primary_phone')? old('primary_phone'):$customer->primary_phone}}" name="primary_phone" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('Secondary Phone Number')</label>
                            <div class="col-sm-6">
                                <input type="text" placeholder="Customer Secondary Phone Number" value="{{old('secondary_phone_number')? old('secondary_phone_number'):$phone}}" name="secondary_phone_number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('Town')<span class='text-danger'>*</span></label>
                            <div class="col-sm-6">
                                @php
                                $selected_town = (old("town"))? old("town"):$customer->town_id;
                                @endphp
                                <select class="form-control" name="town" required>
                                    <option value="">@lang('Select Town')</option>
                                    @foreach ($towns as $t)
                                        <option value="{{$t->id}}" {{ ($selected_town == $t->id ? "selected":"") }} >{{$t->name}}</option>
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