<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-header" style="background: white">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">@tlang('Province')</h4>
        </div>
        <div class="modal-content cl" id="form_content">

            <div class="modal-body"></div>

        </div>
    </div>
</div>
<br>

    <form name="loc_form" method="post" action="{{route('user.client.dashboard.states.delete', ['client' => $client->id])}}" data-ajax="true">
        <input type="hidden" name="_method" value="delete">
        <a data-ajax="true" data-temp="true" data-dst="#form_content" href="{{route('user.client.dashboard.state.create', ['client'=>$client->id])}}"
           class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i
                    class="fa fa-plus"></i> @tlang('Add States')</a>
@if(!empty($states))
        <button type="button" class="btn btn-danger" onclick="swal({
                    type: 'warning',
                    title: '@tlang('Confirm')',
                    text: '@tlang('The selected state/cities will be deleted')',
                    showCancelButton: true,
                    confirmButtonColor:'#DD0000',
                    confirmButtonText: '@tlang('Yes, delete!')',
                    cancelButtonText: '@tlang('No, cancel !')',
                    closeOnConfirm: true,
                    closeOnCancel: true
                 },function(isConfirm){
                    if (isConfirm) {
                        $(loc_form).submit();
                    }

            })"
        ><i class="fa fa-times-circle"></i> @tlang('Delete selected')</button>
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
                                class="fa fa-edit"></i> @tlang('Rename')</a>
                </th>
            </tr>
            <tr>
                <td><input name="state[{{$state->id}}]" value="{{$state->id}}" class="selectAll" type="checkbox"></td>
                <td>
                    <i>@tlang('Cities') ({{count($state->towns)}})</i> |
                    <a data-ajax="true" data-temp="true" data-dst="#form_content" href="{{route('user.client.dashboard.town.create', ['client'=>$client->id, 'state' =>$state->id])}}"
                       data-toggle="modal" data-target="#myModal"><i
                                class="fa fa-plus"></i> @tlang('Add')</a>
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
                class="fa fa-edit"></i> {{--@tlang('Rename')--}}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endforeach
@else
    <div class="alert alert-warning">@tlang('No state record found')</div>
@endif
    </form>

