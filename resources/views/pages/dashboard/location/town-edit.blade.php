
<form data-ajax="true" data-temp="true" data-dst="#form_content" action="{{route('user.client.dashboard.town.update', ['client'=>$client->id, 'town'=> $town->id])}}" method="post" style="max-width: 300px">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="put">
    <fieldset>
        <legend>@lang('Rename Town')</legend>
        <div class="form-group{{ $errors->has('town') ? ' has-error' : '' }}">
            <input name="town" id="town" class="form-control" value="{{$town->name}}" required>
            @if ($errors->has('town'))
                <span class="help-block">
                    <strong>{{ $errors->first('town') }}</strong>
                </span>
            @endif
        </div>
    </fieldset>
    <button class="btn btn-primary"><i class="fa fa-plus"></i> @lang('Edit')</button>
</form>