<h3>Customers</h3>
<div style="text-align: right">
<a href="" class="btn btn-primary"><i class="fa fa-plus"></i> Create customer</a>
</div>
<br>
<table class="table table-strip table-hovered dataTable">
    <thead>
        <tr>
            <th>@lang('Name')</th>
            <th>@lang('Emails')</th>
            <th>@lang('Telephons')</th>
            <th>@lang('State/City')</th>
            <th>@lang('Date Created')</th>
            <th>@lang('Action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
        <tr>
            <td><a href="">{{$customer->name}}</a></td>
            <td>Primary: {{$customer->primary_email}}<br></td>
            <td>Primary: {{$customer->primary_phone}}<br></td>
            <td>{{$customer->town->name}} / {{$customer->town->state->name}}</td>
            <td>{{$customer->created_at}}</td>
            <td>
                <a href="" @lang('Edit')><i class="fa fa-edit"></i></a>
                <a href="" @lang('Open')><i class="fa fa-folder-open"></i></a>
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