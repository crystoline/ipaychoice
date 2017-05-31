@extends('layouts.master')

@section('content')
    <div class="container">
        <div style="sdisplay: none" class="row ws-m">
            <form method="post" action="{{action('ClientController@store')}}" class="col-md-8">
                {{csrf_field()}}
                <fieldset>
                    <legend>@tlang('Register new business')</legend>
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name">@tlang('')Business Name</label>
                                <input class="form-control" id="name" name="name" type="name" value="{{old('name')}}"
                                       type="text" placeholder="@tlang('Enter business\'s name')" required>
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address">@tlang('Address')</label>
                                <textarea name="address" id="address" class="form-control"
                                          placeholder="@tlang('Address')" rows="4">{{old('address')}}</textarea>
                                @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group{{ $errors->has('sub_domain') ? ' has-error' : '' }}">
                                <label for="sub_domain">@tlang('Subdomain')</label>
                                <div class="row">
                                    <div class="col-xs-6" style="padding: 0px; margin: 0px">
                                        <input type="text" name="sub_domain" id="sub_domain" class="form-control"
                                               placeholder="@tlang('Choose a subdomain')" {{old('sub_domain')}}>
                                    </div>
                                    <div class="col-xs-6" style="padding: 0px; margin: 0px; padding-top-7px">
                                        <b> .{{ env('APP_DOMAIN') }}</b>
                                    </div>
                                </div>

                                @if ($errors->has('sub_domain'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sub_domain') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">@tlang('Create')</button>
                </fieldset>


            </form>
        </div>
    </div>
@endsection