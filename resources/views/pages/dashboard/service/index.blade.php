<h3>@lang('Service')</h3>
<div style="text-align: right">
<a href="" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('Create Service')</a>
</div>
<br>
<table class="table table-strip table-hovered dataTable">
    <thead>
        <tr>
            <th>@lang('Service')</th>
            <th>@lang('Price')</th>
            <th>@lang('Date Created')</th>
            <th>@lang('Date Modified')</th>
            <th>@lang('Action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($services as $service)
        <tr>
            <td>{{$service->name}}</td>
            <td>{{$service->price}}</td>
            <td>{{$service->created_at}}</td>
            <td>{{$service->updated_at}}</td>
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