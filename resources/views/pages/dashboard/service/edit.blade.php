<div style="padding: 10px">
     <form data-ajax="true" data-temp="true" method="post" action="{{route('user.client.dashboard.service.update', ['client'=>$client->id, 'service' =>$service->id])}}" data-dst="#form_content">
        {{csrf_field()}}
         <input type="hidden" name="_method" value="put">
        <fieldset>
            <legend>@tlang('Edit Service')</legend>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('service') ? ' has-error' : '' }}">
                        <label for="service">@tlang('Service')</label>
                        <input class="form-control" id="service" name="service" value="{{$service->name}}" required
                               type="text" placeholder="@tlang('Service')">
                        @if ($errors->has('service'))
                            <span class="help-block">
                                <strong>{{ $errors->first('service') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        <label for="price">@tlang('Unit price')</label>
                        <input class="form-control" id="price" name="price" value="{{$service->price}}" required
                               type="text" placeholder="@tlang('price')" >
                        @if ($errors->has('price'))
                            <span class="help-block">
                            <strong>{{ $errors->first('price') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @tlang('Update')</button>
        </fieldset>
    </form>
</div>
