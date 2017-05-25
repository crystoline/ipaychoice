@extends('client.admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3><b>@lang('Edit Service')</b></h3>
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="panel-body">
                    <form action="" method="post" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
                        <input type="hidden" name="_method" value="put">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('Service Name')<span class='text-danger'>*</span></label>
                            <div class="col-sm-6">
                                <input class="form-control" name="name" value="{{(old('name'))? old('name'): $service['name']}}" placeholder="Enter Service Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('Description')<span class='text-danger'>*</span></label>
                            <div class="col-sm-6">
                                <input class="form-control" name="description" value="{{(old('description'))? old('description'): $service['description']}}" placeholder="Enter Service Description" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('Price')<span class='text-danger'>*</span></label>
                            <div class="col-sm-6">
                                <input class="form-control" name="price" value="{{(old('price'))? old('price'): $service['price']}}" placeholder="Price" type="number" step="0.01" min="1" required
                            </div>
                        </div>

                        <br><br>
                        <div class="spacer text-center">
                            <button type="submit" class="btn btn-space btn-primary">@lang('Submit')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection