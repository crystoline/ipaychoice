@extends('layouts.master')

@section('content')
    <p></p>

<div class="container">
    <div class="row">
        <div class="col-md-12">
           <h3 class="alert alert-success">@tlang('verified User')</h3>

            <p>@tlang('Your account has (:email) been verified', ['email'=> $user->email])</p>
            <p>@tlang('You can continue to use our wonderful services')</p>
            <h5><a href="home"> @tlang('Continue')</a></h5>

        </div>
    </div>
</div>
@endsection
