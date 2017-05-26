
<form data-ajax="true" data-temp="true" data-dst="#form_content" action="{{route('user.client.dashboard.state.store', ['client'=>$client->id])}}" method="post" style="max-width: 300px">
    {{csrf_field()}}
    <fieldset>
        <legend>@lang('Add States')</legend>
        <div class="form-group{{ $errors->has('states') ? ' has-error' : '' }}">
            <label for="states">States</label>
            <textarea name="states" id="states" class="form-control" urequired>{{old('states')}}</textarea>
            @if ($errors->has('states'))
                <span class="help-block">
                            <strong>{{ $errors->first('states') }}</strong>
                    </span>
            @endif
        </div>
    </fieldset>


    <button class="btn btn-primary"><i class="fa fa-plus"></i> @lang('Add')</button>
</form>