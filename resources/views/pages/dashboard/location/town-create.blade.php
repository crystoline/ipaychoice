
<form data-ajax="true" data-temp="true" data-dst="#form_content" action="{{route('user.client.dashboard.town.store', ['client'=>$client->id])}}" method="post" style="max-width: 300px">
    {{csrf_field()}}

    <input type="hidden" name="state_id" value="{{$state_id}}">
    <fieldset>
        <legend>@lang('Add Towns')</legend>
        <div class="form-group{{ $errors->has('towns') ? ' has-error' : '' }}">
            <label for="towns">Towns</label>
            <textarea name="towns" id="towns" class="form-control" urequired>{{old('towns')}}</textarea>
            @if ($errors->has('towns'))
                <span class="help-block">
                            <strong>{{ $errors->first('towns') }}</strong>
                    </span>
            @endif
        </div>
    </fieldset>


    <button class="btn btn-primary"><i class="fa fa-plus"></i> @lang('Add')</button>
</form>