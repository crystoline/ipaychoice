@extends('layouts.master')

@section('content')
    <p></p>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{action('ClientController@create')}}" id="reg_client" class="btn btn-primary btn-lg"><i class="fa fa-plus"></i> Register client</a>

            <p></p>
            <table class="table table-striped table-hover dataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Contact Address</th>
                        <th>Date Registered</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $i =>$client)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td><a href="{{route('user.client.dashboard', ['id' => $client->id])}}">{{ $client->name }}</a></td>
                        <td>{{ $client->address }}</td>
                        <td>{{ $client->created_at }}</td>
                        <td><a href="{{action('ClientController@edit',['id'=>$client->id])}}" style="color: black"><span class="fa fa-edit"></span></a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('javascript')
    <script>
        $(function(){
            $('.dataTable').DataTable();
        })
    </script>
@endsection
