<h3> @tlang('Invoices')</h3>
<div style="text-align: right">
{{--<a href="" class="btn btn-primary"><i class="fa fa-plus"></i>  @tlang('Create invoice')</a>--}}
</div>
<br>
<table class="table table-strip table-hovered dataTable">
    <thead>
        <tr>
            <th> @tlang('Customer')</th>
            <th> @tlang('Total Amount')</th>
            <th> @tlang('Cash Officer')</th>
            <th> @tlang('Location')</th>
            <th> @tlang('Status')</th>
            <th> @tlang('Date Created')</th>
            <th> @tlang('Action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($invoices as $invoice)
        <tr>
            <td>{{$invoice->customer->name}}</td>
            <td>{{$invoice->amount}}</td>
            <td>{{$invoice->officer->fullname}}</td>
            <td>{{$invoice->customer->town->state->name}} / {{$invoice->customer->town->name}}</td>
            <td>
                @if($invoice->status == 0)
                    @tlang('Pending')
                @elseif($invoice->status == 1)
                     @tlang('Paid')
                @else
                     @tlang('Unknown')
                @endif
            </td>
            <td>{{$invoice->updated_at}}</td>
            <td>
                <a data-ajax="true" href="{{route('user.client.dashboard.invoice', ['client'=> $client->id, 'invoice'=>$invoice->id])}}" title=" @tlang('Open')"><i class="fa fa-folder"></i></a>
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

