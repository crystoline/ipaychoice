<h3>@tlang('Cash Officers')</h3>
<div style="text-align: right">
<a data-ajax="true" href="{{route('user.client.dashboard.officer.create',['id' => $client->id])}}" class="btn btn-primary"><i class="fa fa-plus"></i> @tlang('New Cash Officer')</a>
</div>
<br>
<table class="table table-strip table-hovered dataTable">
    <thead>
        <tr>
            <th>@tlang('Name')</th>
            <th>@tlang('Email')</th>
            <th>@tlang('Accoun Type')</th>
            <th>@tlang('Date Created')</th>
            <th>@tlang('Action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($officers as $officer)
        <tr>
            <td>
                <a data-ajax="true" href="{{route('user.client.dashboard.officer', ['client' => $client->id, 'id'=>$officer->id])}}">{{$officer->first_name}} {{$officer->last_name}}</a></td>
            <td>{{$officer->email}}</td>
            <td>{{$officer->type}}</td>
            <td>{{$officer->created_at}}</td>
            <td>
                <a data-ajax="true" href="{{route('user.client.dashboard.officer.edit', ['client' => $client->id, 'officer' =>$officer->id])}}"><i class="fa fa-edit"></i> @tlang('Edit')</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script>
    $(function(){
        $('.dataTable').DataTable();
    })
</script>