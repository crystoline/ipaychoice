<h3>Customers</h3>
<div style="">
    <form action="{{route('user.client.dashboard.state.store', ['client'=>$client->id])}}" method="post" style="max-width: 300px">
        {{csrf_field()}}
        <fieldset>
            <legend>@lang('Add States')</legend>
            <div class="form-group{{ $errors->has('states') ? ' has-error' : '' }}">
                <label for="states">States</label>
                <textarea name="state" id="states" class="form-control" urequired></textarea>
                @if ($errors->has('states'))
                    <span class="help-block">
                            <strong>{{ $errors->first('states') }}</strong>
                    </span>
                @endif
            </div>
        </fieldset>


        <button class="btn btn-primary"><i class="fa fa-plus"></i> @lang('Save')</button>    </form>
</div>
<br>
@if(!empty($states))
    @foreach($states as $state)
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
                        {{$state->name}}
                    </a></h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    {{$state->name}}
                    This is a simple accordion inner content...
                </div>
            </div>
        </div>
    </div>
    @endforeach
@else
    <div class="alert alert-warning">@lang('No state record found')</div>
@endif
