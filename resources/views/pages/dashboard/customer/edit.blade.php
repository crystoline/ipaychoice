<div class="container">
    <p></p>

    <form data-ajax="true" method="post" action="{{route('user.client.dashboard.customer.update', ['id'=>$client->id, 'customer'=> $customer->id])}}" class=" col-md-8">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="put" >
        <fieldset>
            <legend>@tlang('Edit customer\'s detail')</legend>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">@tlang('Customer\'s name')</label>
                        <input class="form-control" id="name" name="name" value="{{$client->name}}"
                               type="text" placeholder="@tlang('name')" required>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">@tlang('Primary Email')</label>
                        <input class="form-control" id="email" type="email" name="email" value="{{$client->email}}"
                               placeholder="@tlang('primary Email')" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('secondary_email') ? ' has-error' : '' }}">
                        <label for="secondary_email">Email</label>
                        <input class="form-control" id="secondary_email" type="email" name="secondary_email" value="{{$client->secondary_email}}"
                               placeholder="@tlang('Secondary Email')">
                        @if ($errors->has('secondary_email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('secondary_email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                        <label for="telephone">@tlang('Primary Telephone')</label>
                        <input class="form-control" id="telephone" type="telephone" name="telephone" value="{{$client->telephone}}"
                               placeholder="@tlang('primary telephone')" required>
                        @if ($errors->has('telephone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('telephone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('secondary_telephone') ? ' has-error' : '' }}">
                        <label for="secondary_telephone">@tlang('Secondary Telephone')</label>
                        <input class="form-control" id="secondary_telephone" type="telephone" name="secondary_email" value="{{$client->secondary_telephone}}"
                               placeholder="@tlang('Secondary Telephone')">
                        @if ($errors->has('secondary_telephone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('secondary_telephone') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                        <label for="state">@tlang('Province')</label>
                        <select multiple class="form-control" id="state" type="text" name="state"
                                placeholder="@tlang('Choose a province')" required onchange="getTowns('{{('/dashboard/'.$client->id.'/api/state')}}', this, '#town_options' )">
                            <option disabled selected style="color: grey"></option>
                            <optgroup label="@tlang('Province')">
                                @foreach(\App\Models\Clients\State::get() as $state)
                                    <option value="{{$state->id}}" @if($customer->town->state_id == $state->id) selected @endif>{{$state->name}}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        @if ($errors->has('state'))
                            <span class="help-block">
                                <strong>{{ $errors->first('state') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('town') ? ' has-error' : '' }}">
                        <label for="town">@tlang('City')</label>
                        <select class="form-control" id="town" multiple type="text" name="town" required placeholder="@tlang('Choose a city')">
                            <optgroup label="@tlang('towns')" id="town_options">
                                <option value="{{$customer->town->id}}" selected>{{$customer->town->name}}</option>
                            </optgroup>
                        </select>
                        @if ($errors->has('town'))
                            <span class="help-block">
                                <strong>{{ $errors->first('town') }}</strong>
                            </span>
                        @endif
                    </div>

                    <script>
                        $('#town').tokenize2({
                            tokensMaxItems: 1,
                            //'z-index ': 'auto',
                            tokensAllowCustom: true
                        });
                        $('#state').tokenize2({
                            tokensMaxItems: 1,
                            tokensAllowCustom: true,
                            'z-index ': 'auto',
                        });
                    </script>
                    <p>&nbsp;
                    </p>

                    <button type="submit" class="btn btn-primary" onclick="$('#town').trigger('tokenize:paste')">@tlang('Update')</button>

                </div>
            </div>
        </fieldset>
    </form>
</div>
<script>
    $(function(){
        $('#state').on('tokenize:tokens:add',function(){
            getTowns('{{('/dashboard/'.$client->id.'/api/state')}}',$(this).val(), '#town_options' )
        });
    })
    function getTowns(url, obj, target){
        //alert(url+obj.value);
        $.get( url+ '/'+$(obj).val() +'/cities', function( data ) {
            if(data.length == 0){
                $(target ).html( '<option disabled style="color: black">@tlang('No cities available')</option>' );
            }else {
                var str = '';
                for (var i = 0; i < data.length; i++) {
                    var city = data[i];
                    str += '<option value="' + city.id + '" text="' + city.name + '">' + city.name + '</option>';
                }
                $(target).html(str);
            }

        });
    }
</script>