<h3>@lang('Invoices')</h3>
<div style="text-align: right">
{{--<a href="" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('Create invoice')</a>--}}
</div>
<br>
<table class="table table-strip table-hovered dataTable">
    <thead>
        <tr>
            <th>@lang('Customer')</th>
            <th>@lang('Total Amount')</th>
            <th>@lang('Cash Officer')</th>
            <th>@lang('Location')</th>
            <th>@lang('Status')</th>
            <th>@lang('Date Created')</th>
            <th>@lang('Action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($invoices as $invoice)
        <tr>
            <td>{{$invoice->customer}}</td>
            <td>{{$invoice->amount}}</td>
            <td>{{$invoice->officer->fullname}}</td>
            <td>{{$invoice->customer->town->state->name}} / {{$invoice->customer->town->name}}</td>
            <td>{{$invoice->status}}</td>
            <td>{{$invoice->updated_at}}</td>
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

