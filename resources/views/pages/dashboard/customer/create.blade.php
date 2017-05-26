<div class="container">
    <p></p>

    <form data-ajax="true" method="post" action="{{route('user.client.dashboard.customer.store', ['id'=>$client->id])}}" class=" col-md-8">
        {{csrf_field()}}
        <fieldset>
            <legend>@lang('Register Customer')</legend>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">@lang('Customer\'s name')</label>
                        <input class="form-control" id="name" name="name" value="{{old('name')}}"
                               type="text" placeholder="@lang('name')" required>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">@lang('Primary Email')</label>
                        <input class="form-control" id="email" type="email" name="email" value="{{old('email')}}"
                               placeholder="@lang('primary Email')" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('secondary_email') ? ' has-error' : '' }}">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" type="email" name="secondary_email" value="{{old('secondary_email')}}"
                               placeholder="@lang('Secondary Email')">
                        @if ($errors->has('secondary_email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('secondary_email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                        <label for="telephone">@lang('Primary Telephone')</label>
                        <input class="form-control" id="telephone" type="telephone" name="telephone" value="{{old('telephone')}}"
                               placeholder="@lang('primary telephone')" required>
                        @if ($errors->has('telephone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('telephone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('secondary_telephone') ? ' has-error' : '' }}">
                        <label for="secondary_telephone">@lang('Secondary Email')</label>
                        <input class="form-control" id="secondary_telephone" type="telephone" name="secondary_email" value="{{old('secondary_telephone')}}"
                               placeholder="@lang('Secondary Telephone')">
                        @if ($errors->has('secondary_telephone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('secondary_telephone') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                        <label for="state">@lang('State')</label>
                        <select multiple class="form-control" id="state" type="text" name="state" value="{{old('state')}}"
                                placeholder="@lang('Choose a state')" required onchange="getTowns('{{('/dashboard/'.$client->id.'/api/state')}}', this, '#town_options' )">
                            <option disabled selected style="color: grey"></option>
                            <optgroup label="@lang('town')">
                                @foreach($states as $state)
                                    <option value="{{$state->id}}">{{$state->name}}</option>
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
                        <label for="town">@lang('City')</label>
                        <select class="form-control" id="town" multiple type="text" name="town" value="{{old('town')}}"
                                placeholder="@lang('Town')" required placeholder="@lang('Choose a city')">
                            <optgroup label="@lang('town')" id="town_options">

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
                                tokensAllowCustom: true,
                                'z-index ': 'auto',
                            });
                        </script>
                    <p>&nbsp;
                    </p>

                    <button type="submit" class="btn btn-primary" onclick="$('#town').trigger('tokenize:paste')">Create</button>

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
    function getTowns(url, val, target){
        //alert(url+obj.value);
        $.get( url+ '/'+val +'/cities', function( data ) {
            if(data.length == 0){
                $(target ).html( '<option disabled style="color: black">@lang('No cities available')</option>' );
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