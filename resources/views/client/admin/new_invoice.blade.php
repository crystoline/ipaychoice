@extends('client.admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3><b>Add New Invoice</b></h3>
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
                    <form style="border-radius: 0px;" method="post" action="" class="form-horizontal group-border-dashed">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('Invoice No')<span class='text-danger'>*</span></label>
                            <label style="text-align: left" class="col-sm-6 text-left control-label">{{$invoice_no}}<span class='text-danger'>*</span></label>
                            <input id="invoice_no" type="hidden" name="invoice_no" value="{{$invoice_no}}">
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('Customer')<span class='text-danger'>*</span></label>
                            <div class="col-sm-6">
                                <select class="form-control" name="customer" required id="customer">
                                    <option value="">@lang('Select Customer')</option>
                                    @foreach ($customers as $c)
                                        <option value="{{$c->id}}" {{ (old("customer") == $c->id ? "selected":"") }} >{{$c->name}}</option>
                                    @endforeach
                                </select>
                                <div class="spacer text-right">
                                    <a  style="cursor: pointer" data-toggle="modal" data-target="#form-mod">@lang('Add New Customer')</a>
                                </div>
                            </div>
                        </div>

                        <div style="border: solid 1px #2d7cff">
                            <div class="panel-heading">
                                <h4>All Invoice Items</h4>
                            </div>
                            <div id="all_items"></div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">@lang('Add new Item')<span class='text-danger'>*</span></label>
                                <div class="col-sm-6">
                                    <div class="input-group xs-mb-15">
                                        <input list="services" id="item_select" class="form-control">
                                        <span class="input-group-btn">
                                        <button type="button" class="btn btn-primary" onclick="addItem()">Add!</button></span>
                                    </div>
                                    <datalist id="services">
                                        @foreach ($services as $s)
                                        <option value="{{$s->name}}">
                                        @endforeach
                                    </datalist>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('Currency')<span class='text-danger'>*</span></label>
                            <div class="col-sm-6">
                                <select class="form-control" name="currency" required id="currency">
                                    <option value="">@lang('Select Currency')</option>
                                    @foreach ($currencies as $c)
                                        <option value="{{$c->id}}" {{ (old("currency") == $c->id ? "selected":"") }} >{{$c->name}} ({{$c->code}})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Additional Notes</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" id="note" placeholder="Additional Notes for the Customer" name="note" maxlength="355">{{  old('note') }}</textarea>
                            </div>
                        </div>

                        <br>
                        <div class="spacer text-center">
                            <button type="button" class="btn btn-space btn-danger" onclick="populate()" data-toggle="modal" data-target="#preview">@lang('Preview Invoice')</button>
                            <button type="submit" class="btn btn-space btn-primary">@lang('Submit')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="form-mod" tabindex="-1" role="dialog" class="modal fade colored-header">
        <div class="modal-dialog custom-width">
            <div class="modal-content">
                <form style="border-radius: 0px;" onsubmit="return false;" class="form-horizontal group-border-dashed" id="customer_form">
                    <div class="modal-header">
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close"><i class="icon s7-close"></i></button>
                        <h3 class="modal-title">@lang('New Customer')</h3>
                    </div>

                    <div class="modal-body form">
                        <div id="errors" class="text-danger"></div>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('Customer Name')<span class='text-danger'>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Name of the Customer" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('Primary Email')<span class='text-danger'>*</span></label>
                            <div class="col-sm-6">
                                <input type="email" placeholder="Customer Primary Email" value="{{old('primary_email')}}" name="primary_email" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('Secondary Email')</label>
                            <div class="col-sm-6">
                                <input type="email" placeholder="Customer Secondary Email" name="secondary_email" value="{{old('secondary_email')}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('Primary Phone Number')<span class='text-danger'>*</span></label>
                            <div class="col-sm-6">
                                <input type="text" placeholder="Customer Primary Phone Number" value="{{old('primary_phone')}}" name="primary_phone" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('Secondary Phone Number')</label>
                            <div class="col-sm-6">
                                <input type="text" placeholder="Customer Secondary Phone Number" value="{{old('secondary_phone_number')}}" name="secondary_phone_number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('Town')<span class='text-danger'>*</span></label>
                            <div class="col-sm-6">
                                <select class="form-control" name="town" required>
                                    <option value="">@lang('Select Town')</option>
                                    @foreach ($towns as $t)
                                        <option value="{{$t->id}}" {{ (old("town") == $t->id ? "selected":"") }} >{{$t->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default md-close" id="close">Cancel</button>
                        <button type="submit" onclick="return new_customer();" class="btn btn-primary">Proceed</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="preview" tabindex="-1" role="dialog" class="modal fade colored-header">
        <div class="modal-dialog full-width">
            <div class="modal-content">
                <div class="modal-body form">
                    <style type="text/css">
                        .invoice-title h2, .invoice-title h3 {
                            display: inline-block;
                        }

                        .table > tbody > tr > .no-line {
                            border-top: none;
                        }
                        .table > tbody > tr > td {
                            padding: 8px 10px;
                            border: 0px;
                        }
                        .table > thead > tr > .no-line {
                            border-bottom: none;
                        }
                        .table > tbody > tr > .thick-line {
                            border-top: 2px solid;
                        }

                        .table { border:0px;}

                    </style>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="invoice-title">
                                <h2>Invoice</h2><h1 class="pull-right"><b>INNOVEXI</b></h1>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <table class="table table-responsive table-condensed">
                                            <tr><td><strong>Billed to:</strong></td></tr>
                                            <tr><td id="name_cont"></td></tr>
                                            <tr><td id="em_cont"></td></tr>
                                            <tr><td id="ph_cont"></td></tr>
                                            <tr><td id="to_cont"></td></tr>
                                        </table>
                                    </div>
                                    <div class="col-xs-2 text-right"></div>
                                    <div class="col-xs-4 text-right">
                                        <table class="table table-responsive table-condensed">
                                            <tr><td> <strong>Invoice No:</strong></td><td class="text-left">{{$invoice_no}}</td></tr>
                                            <tr><td><strong>Invoice Date</strong></td><td class="text-left">{{date('d-m-Y')}} </td></tr>
                                            <tr><td><strong>Amount Due</strong></td><td class="text-left" id="am_cont"> </td></tr>
                                        </table>
                                        <br>    <br>   <br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Order summary</strong></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-condensed" id="items_table">
                                            <thead>
                                            <tr>
                                                <td><strong>Item(s)</strong></td>
                                                <td class="text-right"><strong>Price</strong></td>
                                                <td class="text-right"><strong>Quantity</strong></td>
                                                <td class="text-right"><strong>Total</strong></td>
                                            </tr>
                                            </thead>
                                            <tbody id="items">

                                            <tr>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                <td class="thick-line text-right"><strong>Subtotal</strong></td>
                                                <td class="thick-line text-right" id="tot_cont"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div><span id="no_cont"></span><br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default md-close" id="close">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        $(".datetimepicker").datetimepicker({autoclose:!0,componentIcon:".s7-date",navIcons:{rightIcon:"s7-angle-right",leftIcon:"s7-angle-left"}});


        nextDocument = 1;
        allDocuments = 0;
        function addItem(){
            var item = document.getElementById("item_select").value;

            if (item == '') {
                alert('Please enter a valid Item Name')
            } else {
                document.getElementById("item_select").value = '';
                $.ajax({
                    method: 'GET',
                    url: '/admin/get_service',
                    data: {'name': item},
                    success: function (response) {
                        if (response == 'new') {
                            var desc = '';
                            var price = 1;
                            var type = 'new';
                            var readonly = '';
                        } else {
                            var desc = response['description'];
                            var price = response['price'];
                            var type = 'not_new';
                            var readonly = 'readonly';
                        }

                        try {
                            cont = document.getElementById("all_items");

                            newDoc = '<div class="form-group">';
                            newDoc = newDoc + '<div class="col-sm-1"></div>';
                            newDoc = newDoc + '<div class="col-sm-3"><input class="form-control item" name="item[]" value="'+item+'" placeholder="Enter Item Name" required '+readonly+'></div>';
                            newDoc = newDoc + '<div class="col-sm-3"><input class="form-control desc" name="desc[]" value="'+desc+'" placeholder="Enter Item Description" required></div>';
                            newDoc = newDoc + '<div class="col-sm-1"><input class="form-control quantity" name="quantity[]" placeholder="Quantity" value="1" type="number" min="1" required></div>';
                            newDoc = newDoc + '<div class="col-sm-2"><input class="form-control price" name="price[]" value="'+price+'" placeholder="Price" type="number" step="0.01" min="1" required></div>';
                            newDoc = newDoc + '<div class="col-sm-1"><a style="cursor: pointer" onclick="removeItem(' + nextDocument + ');">Remove</a></div>';
                            newDoc = newDoc + '<input value="'+type+'" type="hidden" name="type[]">';
                            newDoc = newDoc + "</div>";

                            newDiv = document.createElement("div");
                            newDiv.id = "itemdiv" + nextDocument;
                            newDiv.className = "itemDivs";
                            newDiv.innerHTML = newDoc;
                            cont.appendChild(newDiv);

                            nextDocument++;
                            allDocuments++;
                        } catch (e) {
                            console.log(e);
                            console.log("An error occurred while trying to add a new specimen.");
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(JSON.stringify(jqXHR));
                        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                    }
                });
            }
        }

        function removeItem(whichDoc){
            var c = "itemdiv" + whichDoc;
            try {
                c = document.getElementById(c);
                c.parentNode.removeChild(c);
                allDocuments--;
            } catch (e) {
                alert ("An error occurred while trying to add a new specimen.");
            }
        }

        function getTotal() {
            prices = document.getElementsByClassName('price');
            quantities = document.getElementsByClassName('quantity');

            total = 0
            for (var i=0;i<(prices.length);i++) {
                amount = prices[i].value * quantities[i].value;
                total += amount;
            }

            return total;
        }

        function populate() {
            var customer = document.getElementById("customer").value;
            var currency = document.getElementById("currency").value;

            if (customer != '') {
                $.ajax({
                    method: 'GET',
                    url: '/admin/ajax_get_customer',
                    data: {'id':customer},
                    success: function (response) {
                        document.getElementById("name_cont").innerHTML = response['name'];
                        document.getElementById("em_cont").innerHTML = response['primary_email'];
                        document.getElementById("ph_cont").innerHTML = response['primary_phone'];
                        document.getElementById("to_cont").innerHTML = response['town']['name']+', '+response['town']['state']['name']+'.';
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(JSON.stringify(jqXHR));
                        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                    }
                })
            }

            document.getElementById("no_cont").innerHTML = document.getElementById("note").value;
            document.getElementById("am_cont").innerHTML = currency+getTotal();
            document.getElementById("tot_cont").innerHTML = currency+getTotal();

            items = document.getElementsByClassName('item');
            prices = document.getElementsByClassName('price');
            quantities = document.getElementsByClassName('quantity');

            var table = document.getElementById("items_table").getElementsByTagName('tbody')[0];
//            console.log()
            if (table.rows.length > 1) {
                for (var i = 0; i < ((table.rows.length) - 1); i++) {
                    table.deleteRow(i);
                }
            }
            for (var i=0;i<(prices.length);i++) {

                var row = table.insertRow((table.rows.length)-1);

                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);

                cell1.style.textAlign = 'left';
                cell2.style.textAlign = 'right';
                cell3.style.textAlign = 'right';
                cell4.style.textAlign = 'right';

                cell1.innerHTML = items[i].value;
                cell2.innerHTML = prices[i].value;
                cell3.innerHTML = quantities[i].value;
                cell4.innerHTML = currency+(prices[i].value*quantities[i].value);
            }
        }

        function new_customer() {
            var request = $('#customer_form').serializeArray().reduce(function(obj, item) {
                obj[item.name] = item.value;
                return obj;
            }, {});

            $.ajax({
                method: 'POST',
                url: '/admin/ajax_customer',
                data: request,
                success: function (response) {
                    if (response[0] == 'fail') {
                        var content = "<ul>";
                        var errors = response[1];
                        for(var key in errors) {
                            content = content+'<li>'+errors[key]+'</li>';
                        }
                        content = content + '</ul>';
                        document.getElementById("errors").innerHTML = content;
                    } else if (response[0] == 'pass') {
                        var select = document.getElementById("customer");
                        var el = document.createElement("option");
                        el.textContent = response[2];
                        el.value = response[1];
                        el.selected = true;
                        select.appendChild(el);
                        $("#close").click();
                        document.getElementById("customer_form").reset();
                        document.getElementById("errors").innerHTML = '';
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            })
        }
    </script>
@endsection