@extends('layouts.master')

@section('content')
    <p></p>

<div class="container">
    <div class="row">
        <div class="col-md-12">
           <h3>@tlang('Unverified User')</h3>
            @if(!empty($messages))
            <div class="alert alert-danger">{{@$messages}}</div>
            @endif
            <p>@tlang('Your account has (:email) not been verified', ['email'=> $user->email])</p>
            <p>@tlang('Check your inbox for verification link')</p>
            <h5><a href="{{route('user.unverified.resend', ['email'=> $user->email])}}">@tlang('Resend Link')?</a></h5>

        </div>
    </div>
</div>
@endsection