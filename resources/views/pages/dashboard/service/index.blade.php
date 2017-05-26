<h3>@lang('Service')</h3>
<div style="text-align: right">
    <a data-ajax="true" data-temp="true" data-dst="#form_content" href="{{route('user.client.dashboard.service.create', ['client'=> $client->id])}}"
       class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i
                class="fa fa-plus"></i> @lang('Create Service')</a>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-header" style="background: white">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">@lang('Create Service')</h4>
        </div>
        <div class="modal-content cl" id="form_content">

            <div class="modal-body"></div>

            {{--<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>--}}
        </div>
    </div>
</div>
<div class="modal fade" id="myModal2" tabindex="-2" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content cl" id="form_content_edit">
        </div>
    </div>
</div>
<br>
<table class="table table-strip table-hovered dataTable">
    <thead>
    <tr>
        <th>@lang('Service')</th>
        <th>@lang('Price')</th>
        <th>@lang('Date Created')</th>
        <th>@lang('Date Modified')</th>
        <th>@lang('Action')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($services as $service)
        <tr>
            <td>{{$service->name}}</td>
            <td>{{$service->price}}</td>
            <td>{{$service->created_at}}</td>
            <td>{{$service->updated_at}}</td>
            <td>
                <a data-toggle="modal" data-target="#myModal2"
                   href="{{route('user.client.dashboard.service.edit', ['client'=> $client->id, 'service' => $service->id])}}"><i
                            class="fa fa-edit"></i></a>
                <a href="#" onclick="deleteItem(event,'{{route('user.client.dashboard.service.delete', ['client'=> $client->id, 'service' => $service->id])}}','{{$service->name}}')"><i class="fa fa-times-circle"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<script>
    $(function () {
        $('.dataTable').DataTable();


    })
    function deleteItem(e,url,name) {
        e.preventDefault();
        swal({
                    title: "Are you sure?",
                    text: name+ " will be deleted!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "@lang('Yes, delete it')!",
                    cancelButtonText: "@lang('No, cancel')!",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: {
                                '_method': 'delete',
                                //'_token': '{{csrf_token()}}'
                            },
                            success: function(){
                                swal("Deleted!", name+ " was deleted!", "info");
                                location.reload();
                            }
                        });

                    }
                });

    }
</script>