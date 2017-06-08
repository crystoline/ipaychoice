<p>&nbsp;</p>
<div class="panel panel-info">
    <div class="panel-heading">
        <div class="panel-title">
            <div class="row">
                <div class="col-xs-10">
                    <h3>{{$officer->first_name}} {{$officer->lastname}}</h3>
                </div>
                <div class="col-xs-2">
                    <a class="btn btn-info" data-ajax="true" href="{{route('user.client.dashboard.officer.edit', ['client' => $client->id, 'officer' =>$officer->id])}}"><i class="fa fa-edit"></i> Edit</a>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-user-information">
            <tbody>
                <tr>
                    <td>@tlang('Email'):</td>
                    <td>{{$officer->email}}</td>
                </tr>
                <tr>
                    <td>@tlang('Account Type'):</td>
                    <td>{{$officer->type}}</td>
                </tr>
                <tr>
                    <td>@tlang('Date Registered')</td>
                    <td>{{$officer->created_at}}</td>
                </tr>
                <tr>
                    <td>@tlang('last Modified')</td>
                    <td>{{$officer->modified_at}}</td>
                </tr>
            </tbody>

        </table>
        <h5>@tlang('Permissions')</h5>
        @php
            $permissions = $officer->townsArray;
            //var_dump($permissions);
        $x = 0;
        @endphp

        @if($states = \App\Models\Clients\State::with(['towns'])->get())
            <form data-ajax="true" method="post" action="{{route('user.client.dashboard.officer.update', ['client'=>$client->id, 'officer'=> $officer->id])}}">
                <input type="hidden" name="permission" value="1">
                <input type="hidden" name="_method" value="put" >
        <button type="submit" class="btn btn-info"><i class="fa fa-times-circle"></i> @tlang('Update Permissions')</button>
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

                        </th>
                    </tr>
                    <tr>
                        <td><input  class="selectAll" type="checkbox"></td>
                        <td>
                            <i>@tlang('Cities') ({{count($state->towns)}})</i>

                        </td>
                    </tr>
                    </thead>
                    <tbody id="collapseOne{{$i}}" class="panel-collapse collapse out">
                    @foreach($state->towns as $town)
                        <tr>
                            <th>
                               {{-- <div class="checkbox checkbox-info">--}}
                                    <input name="towns[]" value="{{$town->id}}"  type="checkbox" @if(in_array($town->id, $permissions)) checked @endif >
                               {{-- </div>--}}</th>
                            <td>
                                {{$town->name}}

                            </td>
                        </tr>
                        @php
                            $x++;
                        @endphp
                    @endforeach
                    </tbody>
                </table>

            @endforeach
            </form>
        @else
            <div class="alert alert-warning">@tlang('No records found')</div>
        @endif
    </div>
</div>
