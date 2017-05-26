@extends('client.admin.layouts.master')

@section('content')

<div class="page-head">
          <h2>@lang('States &amp; Towns')</h2>
        </div>
        <div class="main-content">
<div class="row">
            <div class="col-sm-12">
              <div class="widget widget-fullwidth widget-small">
                <div class="widget-head">
                @if (Session::has('status'))
                     <div class="alert alert-success">
                                                    <p>{{ Session::get('status') }}</p>
                                                </div>
                                            @endif
                  <div class="title"><b>@lang('All States/Towns')</b></div>

                @if (count($states) == 0) 
                     <br><br><p>You've not added any state/towns yet.</p>
                @else
                </div>
                
                @endif
              </div>
            </div>
          </div>
          </div>
@endsection