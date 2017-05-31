<div class="container">
    <p></p>

    <form data-ajax="true" method="post" action="{{route('user.client.dashboard.officer.update', ['client'=>$client->id, 'officer'=> $officer->id])}}" class=" col-md-8">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="put" >
        <fieldset>
            <legend>Edit Officer Details</legend>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <label for="first_name">@lang('Firstname')</label>
                        <input class="form-control" id="first_name" name="first_name" value="{{$officer->first_name}}"
                               type="text" placeholder="@lang('Firstname')" required>
                        @if ($errors->has('first_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <label for="last_name">@lang('Lastname')</label>
                        <input class="form-control" id="last_name" name="last_name" value="{{$officer->last_name}}"
                               type="text" placeholder="@lang('Lastname')" required>
                        @if ($errors->has('last_name'))
                            <span class="help-block">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" type="email" name="email" value="{{$officer->email}}"
                               placeholder="@lang('Email')" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </fieldset>
    </form>
</div>