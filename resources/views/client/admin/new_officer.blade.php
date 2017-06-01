@extends('client.admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3><b>@lang('Add New Cash Officer')</b></h3>
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
                            <label class="col-sm-3 control-label">@lang('First Name')<span class='text-danger'>*</span></label>
                            <div class="col-sm-6">
                                <input class="form-control" name="first_name" value="{{old('first_name')}}"
                                       type="text" placeholder="@lang('First name')" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('Last Name')<span class='text-danger'>*</span></label>
                            <div class="col-sm-6">
                                <input class="form-control" id="last_name" name="last_name" value="{{old('last_name')}}"
                                       type="text" placeholder="@lang('Last name')" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('Email')<span class='text-danger'>*</span></label>
                            <div class="col-sm-6">
                                <input class="form-control" id="email" type="email" name="email" value="{{old('email')}}"
                                                          placeholder="@lang('Email')" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('Assigned Towns')<span class='text-danger'>*</span></label>
                            <div class="col-sm-6">
                                <select class="form-control" id="town" multiple name="town[]" required placeholder="@lang('Choose a city')">
                                        @php
                                        foreach ($states as $s) {
                                            echo "<optgroup style='font-weight:bold' label=".$s->name.">" ;
                                            $towns = $s->towns;

                                            foreach ($towns as $t) {
                                                echo "<option value=".$t->id.">".$t->name."</option>";
                                            }
                                            echo "</optgroup>";
                                        }
                                        @endphp
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