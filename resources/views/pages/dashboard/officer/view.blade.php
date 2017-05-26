<p>&nbsp;</p>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{{$officer->first_name}} {{$officer->lastname}}</h3>
    </div>
    <div class="panel-body">
        <table class="table table-user-information">
            <tbody>
                <tr>
                    <td>@lang('Email'):</td>
                    <td>{{$officer->email}}</td>
                </tr>
                <tr>
                    <td>@lang('Date Registered')</td>
                    <td>{{$officer->created_at}}</td>
                </tr>
                <tr>
                    <td>@lang('last Modified')</td>
                    <td>{{$officer->modified_at}}</td>
                </tr>
            </tbody>

        </table>
        <h5>Permissions</h5>

        {{--@if(!empty($officer->states))
            @foreach($officer->states as $i =>$state)

                <table class="table table-light">
                    <thead data-toggle="collapse" data-parent="#accordion1" href="#collapseOne{{$i}}">
                    <tr>
                        <th><input name="" type="checkbox"></th>
                        <th>@lang('Name')</th>
                    </tr>
                    <tr>
                        <th><input name="" type="checkbox"></th>
                        <td>{{$state->name}}</td>
                    </tr>
                    </thead>
                    <tbody id="collapseOne{{$i}}" class="panel-collapse collapse out">
                    @foreach($state->towns as $town)
                        <tr>
                            <th><input name="" type="checkbox"></th>
                            <td>{{$town->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            @endforeach
        @else
            <div class="alert alert-warning">@lang('No state record found')</div>
        @endif--}}
    </div>
</div>
