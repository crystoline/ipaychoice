<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-header" style="background: white">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">@lang('State')</h4>
        </div>
        <div class="modal-content cl" id="form_content">

            <div class="modal-body"></div>

        </div>
    </div>
</div>
<br>

    <form method="post" action="{{route('user.client.dashboard.states.delete', ['client' => $client->id])}}" data-ajax="true">
        <input type="hidden" name="_method" value="delete">
        <a data-ajax="true" data-temp="true" data-dst="#form_content" href="{{route('user.client.dashboard.state.create', ['client'=>$client->id])}}"
           class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i
                    class="fa fa-plus"></i> @lang('Add States')</a>
@if(!empty($states))
        <button class="btn btn-danger"><i class="fa fa-times-circle"></i> Delete selected</button>
    @foreach($states as $i =>$state)
    @if($i < 0)
        <hr>
    @endif

    <table class="table table-light" style="max-width: 400px; ">
        <thead >

            <tr data-toggle="collapse" data-parent="#accordion1" href="#collapseOne{{$i}}" style="cursor: pointer">
                <th width="30px">{{$i+1}}</th>
                <th>
                    {{$state->name}} |
                    <a data-ajax="true" data-temp="true" data-dst="#form_content" href="{{route('user.client.dashboard.state.edit', ['client'=>$client->id, $state->id])}}"
                        data-toggle="modal" data-target="#myModal"><i
                                class="fa fa-edit"></i> @lang('Rename')</a>
                </th>
            </tr>
            <tr>
                <td><input name="state[{{$state->id}}]" value="{{$state->id}}" class="selectAll" type="checkbox"></td>
                <td>
                    <i>@lang('Cities') ({{count($state->towns)}})</i> |
                    <a data-ajax="true" data-temp="true" data-dst="#form_content" href="{{route('user.client.dashboard.town.create', ['client'=>$client->id, 'state' =>$state->id])}}"
                       data-toggle="modal" data-target="#myModal"><i
                                class="fa fa-plus"></i> @lang('Add')</a>
                </td>
            </tr>
        </thead>
        <tbody id="collapseOne{{$i}}" class="panel-collapse collapse out">
        @foreach($state->towns as $town)
            <tr>
                <th><input name="town[]" value="{{$town->id}}"  type="checkbox"></th>
                <td>
                    {{$town->name}} |
                    <a data-ajax="true" data-temp="true" data-dst="#form_content" href="{{route('user.client.dashboard.town.edit', ['client'=>$client->id, 'town' => $town->id])}}"
                         data-toggle="modal" data-target="#myModal"><i
                class="fa fa-edit"></i> {{--@lang('Rename')--}}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endforeach
@else
    <div class="alert alert-warning">@lang('No state record found')</div>
@endif
    </form>

