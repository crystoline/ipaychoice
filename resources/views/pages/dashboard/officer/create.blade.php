<div class="container">
    <p></p>

    <form data-ajax="true" method="post" action="{{route('user.client.dashboard.officer.store', ['id'=>$client->id])}}" class=" col-md-8">
        {{csrf_field()}}
        <fieldset>
            <legend>@tlang('Register Cash Officer')</legend>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <label for="first_name">@tlang('Firstname')</label>
                        <input class="form-control" id="first_name" name="first_name" value="{{old('first_name')}}"
                               type="text" placeholder="@tlang('Firstname')" required>
                        @if ($errors->has('first_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <label for="last_name">@tlang('Lastname')</label>
                        <input class="form-control" id="last_name" name="last_name" value="{{old('last_name')}}"
                               type="text" placeholder="@tlang('Lastname')" required>
                        @if ($errors->has('last_name'))
                            <span class="help-block">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">@tlang('Email')</label>
                        <input class="form-control" id="email" type="email" name="email" value="{{old('email')}}"
                               placeholder="@tlang('Email')" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                        <label for="type">@tlang('Type')</label>
                        <select class="form-control" id="type" type="text" name="type" value="{{old('type')}}">
                            <option disabled selected style="color: grey">@tlang('Choose officer type')</option>
                            <option value="default" @if(old('type') != 'admin') selected @endif>@tlang('Default')</option>
                            <option value="admin" @if(old('type') == 'admin') selected @endif>@tlang('Administrator')</option>

                        </select>
                        @if ($errors->has('type'))
                            <span class="help-block">
                                <strong>{{ $errors->first('type') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                        <label for="state">@tlang('Province')</label>
                        <select class="form-control" id="state" type="text" name="state" value="{{old('state')}}"
                                placeholder="@tlang('State')" required onchange="getTowns('{{('/dashboard/'.$client->id.'/api/state')}}', this, '#town_options' )">
                            <option disabled selected style="color: grey">@tlang('Choose a state')</option>
                            <optgroup label="@tlang('state')">
                                @foreach($states as $state)
                                    <option value="{{$state->id}}" {{--@if($state->id == old('state')) selected @endif--}}>{{$state->name}}</option>
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
                        <select class="form-control" id="town" multiple type="text" name="town[]"
                                placeholder="@tlang('Town')" required placeholder="@tlang('Choose a city')">
                            <optgroup label="@tlang('town')" id="town_options">
                                {{--@if(old('town'))
                                    @foreach(old('town') as $town)
                                        <option selected>{{$town}}</option>
                                    @endforeach
                                @endif--}}
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
                    <button type="submit" class="btn btn-primary">@tlang('Create')</button>
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