@extends('layouts.master')

@section('content')
    <p></p>

<div class="container">
    <div class="row">
        <div class="col-md-12">
           <h1>Client not found</h1>
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
