
<form data-ajax="true" data-temp="true" data-dst="#form_content" action="{{route('user.client.dashboard.state.update', ['client'=>$client->id, 'state'=> $state->id])}}" method="post" style="max-width: 300px">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="put">
    <fieldset>
        <legend>@lang('Edit State')</legend>
        <div class="form-group{{ $errors->has('states') ? ' has-error' : '' }}">
            <input name="state" id="state" class="form-control" value="{{$state->name}}" required>
            @if ($errors->has('state'))
                <span class="help-block">
                    <strong>{{ $errors->first('states') }}</strong>
                </span>
            @endif
        </div>
    </fieldset>
    <button class="btn btn-primary"><i class="fa fa-plus"></i> @lang('Edit')</button>
</form>