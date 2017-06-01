<form method="post" action="{{route('user.client.dashboard.setting.update', ['client' => $client->id])}}" enctype="multipart/form-data" data-ajax="true">
    <input type="hidden" name="_method" value="put">
    {{csrf_field()}}
    <div class="row">
        <div class="col-xs-6 col-xm-offset-3">
            <div class="form-group">
                <label class="control-label">
                    @php
                       //print  $client->logoSrc;
                    @endphp
                    @tlang('Logo') <img src="{{$client->logoSrc}}" style="height: 50px" alt="logo">
                </label>
                <input type="file" class="filestyle" data-buttonname="btn-default" id="filestyle-0" tabindex="-1"
                       style="position: absolute; clip: rect(0px 0px 0px 0px);" name="logo">

                <div class="bootstrap-filestyle input-group">
                    <input type="text" class="form-control " placeholder="" disabled="" >
                    <span class="group-span-filestyle input-group-btn" tabindex="0">
                        <label for="filestyle-0" class="btn btn-default ">
                            <span class="icon-span-filestyle glyphicon glyphicon-folder-open"></span>
                            <span class="buttonText">@tlang('Choose logo')</span>
                        </label>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label>@tlang('Default Color')</label>
                <input type="color" class="colorpicker-default form-control" value="{{ old('color')? : @$client->options['color']? : '#8fff00' }}" name="color">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>

</form>