@extends('layouts.master')

@section('content')
    <div class="container">
        <div style="sdisplay: none" class="row ws-m">
            <form method="post" action="{{action('ClientController@store')}}" class="col-md-8">
                {{csrf_field()}}
                <fieldset>
                    <legend>@lang('Register new business')</legend>
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name">@lang('')Business Name</label>
                                <input class="form-control" id="name" name="name" type="name" value="{{old('name')}}"
                                       type="text" placeholder="@lang('Enter business\'s name')" required>
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address">@lang('Address')</label>
                                <textarea name="address" id="address" class="form-control"
                                          placeholder="@lang('Address')" rows="4">{{old('address')}}</textarea>
                                @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group{{ $errors->has('subdomain') ? ' has-error' : '' }}">
                                <label for="subdomain">@lang('Subdomain')</label>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <input name="subdomain" id="subdomain" class="form-control"
                                               placeholder="@lang('Choose a subdomain')" {{old('subdomain')}}>
                                    </div>
                                    <div class="col-xs-6">
                                        @ {{ env('APP_DOMAIN') }}
                                    </div>
                                </div>

                                @if ($errors->has('subdomain'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('subdomain') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">@lang('Create')</button>
                </fieldset>


            </form>
        </div>
    </div>
@endsection