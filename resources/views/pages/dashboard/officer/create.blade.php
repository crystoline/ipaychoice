<div class="container">
    <p></p>

    <form data-ajax="true" method="post" action="{{route('user.client.dashboard.officer.store', ['id'=>$client->id])}}" class=" col-md-8">
        {{csrf_field()}}
        <fieldset>
            <legend>Register Cash Officer</legend>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <label for="first_name">@lang('Firstname')</label>
                        <input class="form-control" id="first_name" name="first_name" value="{{old('first_name')}}"
                               type="text" placeholder="@lang('Firstname')" required>
                        @if ($errors->has('first_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <label for="last_name">@lang('Lastname')</label>
                        <input class="form-control" id="last_name" name="last_name" value="{{old('last_name')}}"
                               type="text" placeholder="@lang('Lastname')" required>
                        @if ($errors->has('last_name'))
                            <span class="help-block">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" type="email" name="email" value="{{old('email')}}"
                               placeholder="@lang('Email')" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                        <label for="state">@lang('State')</label>
                        <select class="form-control" id="state" type="text" name="state" value="{{old('state')}}"
                                placeholder="@lang('State')" required onchange="getTowns('{{('/dashboard/'.$client->id.'/api/state')}}', this, '#town_options' )">
                            <option disabled selected style="color: grey">@lang('Choose a state')</option>
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
                        <select class="form-control" id="town" multiple type="text" name="town[]" value="{{old('town')}}"
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
                    <p>
                        <script>
                            $('#town').tokenize2({
                                //tokensAllowCustom: true,
                                'z-index ': 'auto',
                            });

                        </script>

                    </p>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>
<script>
    function getTowns(url, obj, target){
        //alert(url+obj.value);
        $.get( url+ '/'+obj.value +'/cities', function( data ) {
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