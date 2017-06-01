<h3>@tlang('Customer\'s Details')</h3>

<table class="table">
    <tr>
        <th>@tlang('Name')</th>
        <td>{{$customer->name}}</td>
    </tr>
    <tr>
        <th>@tlang('Email')</th>
        <td>@if($customer->primary_email){{$customer->primary_email}} (@tlang('Primary'))@endif
            @if($customer->email)
                @foreach($customer->email  as $email)
                    $email->email
                @endforeach
            @endif
        </td>
    </tr>
    <tr>
        <th>@tlang('Telephone')</th>
        <td>@if($customer->primary_phone){{$customer->primary_phone}} (@tlang('Primary'))@endif
            @if($customer->telephone)
                @foreach($customer->telephone  as $telephone)
                    $telephone->telephone
                @endforeach
            @endif
        </td>
    </tr>
    <tr>
        <th>@tlang('Location')</th>
        <td>{{$customer->town->state->name}}/{{$customer->town->name}}</td>
    </tr>
</table>
<a data-ajax="true" href="{{route('user.client.dashboard.customer.edit', ['client' => $client->id, 'customer' =>$customer->id])}}" class="btn btn-info">@tlang('Edit')</a>