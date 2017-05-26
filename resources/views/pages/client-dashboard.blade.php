@extends('layouts.dashboard')

@section('content')
    <p>&nbsp;</p>
    <div class="container-fluid">
        <div class="row ws-m">
            <div class="col-md-12" id="content" style="min-height: 400px">
                <h5>My Dashboard here</h5>
            </div>
        </div>
    </div>
@endsection

@section('stylesheets')
<link rel="stylesheet" href="{{asset('css/navbar-fixed-side.min.css')}}" >
    <style>
        .navbar-fixed-side .fa{
            font-size: 18px
        }
        .preloader_trans{
            opacity: 0.7!important;
            filter: alpha(opacity=70) !important;
        }
        .navbar-nav li {
            //padding: 7px;
        }
    </style>
@endsection
@section('javascript')
<script>
    var navigate_base_url = '{{route('user.client.dashboard', ['client'=>$client->id])}}';

</script>
<script>
    $(document).ready(function () {
        loader()
        $(document)
            .ajaxComplete(function () {
                loader()
            });;


    });
    function loader(){
        $(document)
                .ajaxStart(function () {
                    //$('#preloader').addClass('preloader_trans').show();
                    $('#preloader, #preloader #status').addClass('preloader_trans').show();
                })
                .ajaxStop(function () {
                    //$('#preloader #status').fadeOut(); // will first fade out the loading animation
                    $('#preloader, #preloader #status').delay(350).fadeOut('slow', function() {
                        $('#preloader, #preloader #status').removeClass('preloader_trans')
                    });
                })
    }

</script>
@endsection