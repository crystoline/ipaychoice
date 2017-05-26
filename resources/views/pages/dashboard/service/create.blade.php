<div style="padding: 10px">
     <form data-ajax="true" method="post" action="{{route('user.client.dashboard.service.store', ['id'=>$client->id])}}" data-dst="#form_content">
        {{csrf_field()}}
        <fieldset>
            <legend>Add Service</legend>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('service') ? ' has-error' : '' }}">
                        <label for="service">@lang('Service')</label>
                        <input class="form-control" id="service" name="service" value="{{old('service')}}" required
                               type="text" placeholder="@lang('Service')">
                        @if ($errors->has('service'))
                            <span class="help-block">
                                <strong>{{ $errors->first('service') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        <label for="price">@lang('Unit price')</label>
                        <input class="form-control" id="price" name="price" value="{{old('price')}}" required
                               type="text" placeholder="@lang('price')" >
                        @if ($errors->has('price'))
                            <span class="help-block">
                            <strong>{{ $errors->first('price') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
        </fieldset>
    </form>
</div>
