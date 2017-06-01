<h3>Customers</h3>
<div style="text-align: right">
<a data-ajax="true" href="{{route('user.client.dashboard.customer.create', ['client'=> $client->id])}}" class="btn btn-primary"><i class="fa fa-plus"></i> Create customer</a>
</div>
<br>
<table class="table table-strip table-hovered dataTable">
    <thead>
        <tr>
            <th>@tlang('Name')</th>
            <th>@tlang('Emails')</th>
            <th>@tlang('Telephons')</th>
            <th>@tlang('Province/City')</th>
            <th>@tlang('Date Created')</th>
            <th>@tlang('Actions')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
        <tr>
            <td><a data-ajax="true" href="{{route('user.client.dashboard.customer', ['client' => $client->id, 'customer'=>$customer->id])}}">{{$customer->name}}</a></td>
            <td>@tlang('Primary'): {{$customer->primary_email}}<br></td>
            <td>@tlang('Primary'): {{$customer->primary_phone}}<br></td>
            <td>{{$customer->town->name}} / {{$customer->town->state->name}}</td>
            <td>{{$customer->created_at}}</td>
            <td>
                <a data-ajax="true" href="{{route('user.client.dashboard.customer.edit', ['client' => $client->id, 'customer'=>$customer->id])}}"  title="@tlang('Edit')"><i class="fa fa-edit"></i></a>
                <a data-ajax="true" href="{{route('user.client.dashboard.customer', ['client' => $client->id, 'customer'=>$customer->id])}}" title="@tlang('Open')"><i class="fa fa-folder-open"></i></a>
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