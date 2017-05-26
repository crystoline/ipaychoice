<h3>@lang('Cash Officers')</h3>
<div style="text-align: right">
<a data-ajax="true" href="{{route('user.client.dashboard.officer.create',['id' => $client->id])}}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('Create Cash Officer')</a>
</div>
<br>
<table class="table table-strip table-hovered dataTable">
    <thead>
        <tr>
            <th>@lang('Name')</th>
            <th>@lang('Email')</th>
            <th>@lang('Date Created')</th>
            <th>@lang('Action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($officers as $officer)
        <tr>
            <td><a data-ajax="true" href="{{route('user.client.dashboard.officer', ['client' => $client->id, 'id'=>$officer->id])}}">{{$officer->first_name}} {{$officer->last_name}}</a></td>
            <td>{{$officer->email}}</td>
            <td>{{$officer->created_at}}</td>
            <td>
                <a href=""><i class="fa fa-edit"></i></a>
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