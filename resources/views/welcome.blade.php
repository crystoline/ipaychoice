@extends('layouts.master')
        <!--+general-chart("classes", "title", "height", "id", "counter value", "counter desc", tools enabled (use true or false))-->

@section('content')
        <!-- ========== Hero Cover ========== -->
<main>

    <div class="container">
    </div>

</main>
<div id="home" class="animated-hero" style="margin-top: -70px">
    <div class="bg-overlay">

        <!-- Hero Content -->
        <div class="hero-content-wrapper">
            <div class="hero-content">

                <h1 class="cd-headline slide hero-lead wow fadeIn" data-wow-duration="4s">
                  <span class="cd-words-wrapper">
                    <b class="is-visible">{{_('Creativity')}}</b>
                    <b>{{_('Invoiced')}}</b>
                    <b>{{_('Get Paid')}}</b>
                  </span>
                </h1>
                <h4 class="h-alt hero-subheading wow fadeIn" data-wow-duration="2s" data-wow-delay=".7s">{{_('Get started')}}</h4>
                <a href="{{url('register')}}" class="btn btn-light wow fadeIn" data-wow-duration="2s" data-wow-delay="1s">{{_t('Sign up Now')}}</a> or
                <a href="{{url('login')}}" class="btn btn-light wow fadeIn" data-wow-duration="2s" data-wow-delay="1s">{{_t('Sign in')}}</a>

            </div>
        </div>

        <!-- Scroller -->
        <a href="#about" class="scroller">
            <span class="scroller-text">{{_t('scroll down')}}</span>
            <span class="linea-basic-magic-mouse"></span>
        </a>

    </div><!-- / .bg-overlay -->
</div><!-- / .animated-hero -->
@endsection
