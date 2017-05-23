@extends('layouts.master')

@section('content')
    <div class="container">
        <div style="sdisplay: none" class="row ws-m">
            <form method="post" action="{{action('ClientController@store')}}" class="col-md-4">
                {{csrf_field()}}
                <fieldset>
                    <legend>Register new Company</legend>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Name</label>
                        <input class="form-control" id="name" name="name" type="name" value="{{old('name')}}" type="text" placeholder="@lang('Enter Client\'s name')" required>
                        @if ($errors->has('name'))
                            <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <!-- Email -->
                    {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" type="email" name="email" value="{{old('email'}}" placeholder="@lang('Enter Client\'s email')" required>
                         @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>--}}
                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="address">Address</label>
                        <textarea name="address"  id="address"  class="form-control" placeholder="@lang('Client\'s Address')" rows="4">{{old('address')}}</textarea>
                        @if ($errors->has('address'))
                            <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </fieldset>


            </form>
        </div>
    </div>
@endsection