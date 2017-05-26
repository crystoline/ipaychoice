<?php

namespace App\Http\Controllers\Client\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Clients\Customer;
use App\Models\Clients\OfficersPermission;
use App\Models\Clients\Officer;
use App\Models\Clients\Town;
use Illuminate\Support\Facades\Validator;
use Session;

class CustomerController extends Controller
{
    public function index()
    {
        $officer = Session::get('client_admin_officer');
        $permissions = Officer::find($officer->id)->permissions;
        $towns_array=[];
        foreach ($permissions as $p) {
            $towns_array[] = $p->id;
        }

    	$customers = Customer::with('town')->whereIn('town_id',$towns_array)->get();
        return view('client.admin.customers',['customers' => $customers]);
    }

    public function create()
    {
        $officer = Session::get('client_admin_officer');
        $permissions = Officer::find($officer->id)->permissions;
        $towns_array=[];
        foreach ($permissions as $p) {
            $towns_array[] = $p->id;
        }

    	$towns = Town::whereIn('id',$towns_array)->get();
        return view('client.admin.new_customer',['towns'=>$towns]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'primary_email' => 'required|unique:mysql_client.customers|email|max:255',
            'secondary_email' => 'sometimes|nullable|email|max:255',
            'primary_phone' => 'required|max:15|unique:mysql_client.customers',
            'secondary_phone_number' => 'sometimes|nullable|max:15',
            'town' => 'required|string|max:20|exists:mysql_client.towns,id',
        ]);


        $customer = Customer::create([
        	'name' => $request->name,
            'primary_email' => $request->primary_email,
            'primary_phone' => $request->primary_phone,
            'town_id' => $request->town,
        ]);

        $customer->email()->create([
            'email' => $request->secondary_email
        ]);

        $customer->telephone()->create([
            'telephone' => $request->secondary_phone_number
        ]);

        return redirect()->action('Client\Admin\CustomerController@index')->with('status', 'Customer created successfully!');
    }

    public function customer_ajax(Request $request) {
        $validator = Validator::make($request->toArray(), [
            'name' => 'required|string|max:255',
            'primary_email' => 'required|unique:mysql_client.customers|email|max:255',
            'secondary_email' => 'sometimes|nullable|email|max:255',
            'primary_phone' => 'required|max:15|unique:mysql_client.customers',
            'secondary_phone_number' => 'sometimes|nullable|max:15',
            'town' => 'required|string|max:20|exists:mysql_client.towns,id',
        ]);

        if ($validator->fails()) return ['fail',$validator->errors()];

        $customer = Customer::create([
            'name' => $request->name,
            'primary_email' => $request->primary_email,
            'primary_phone' => $request->primary_phone,
            'town_id' => $request->town,
        ]);

        $customer->email()->create([
            'email' => $request->secondary_email
        ]);

        $customer->telephone()->create([
            'telephone' => $request->secondary_phone_number
        ]);

        $customer_id = $customer->id;
        $customer_name = $customer->name;
        return ['pass',$customer_id, $customer_name];
    }

    public function customer_get_ajax(Request $request) {
        $customer = Customer::with('town.state')->find($request->id);
        return $customer->toArray();
    }

    public function edit($id) {
        $officer = Session::get('client_admin_officer');
        $permissions = Officer::find($officer->id)->permissions;
        $towns_array=[];
        foreach ($permissions as $p) {
            $towns_array[] = $p->id;
        }
        $towns = Town::whereIn('id',$towns_array)->get();

        $customer = Customer::find($id);
        $email = $customer->email->toArray();
        $phone = $customer->telephone->toArray();

        $email = ($email)? $email: '';

        $phone =  ($phone)? $phone : '';
        return view('client.admin.edit_customer',['customer' => $customer, 'towns' => $towns,'email'=>$email,'phone'=>$phone]);
    }

    public function update(Request $request, $id) {
//        $service = Service::find($id);
//
//        $this->validate($request, [
//            'name' => 'required|string|max:100',
//            'price' => 'required|regex:/^\d*(\.\d{1,2})?$/',
//            'description' => 'required|string',
//        ]);
//
//        $service->update([
//            'name' => $request->name,
//            'price' => $request->price,
//            'description' => $request->description,
//        ]);
        return redirect()->action('Client\Admin\CustomerController@index')->with('status', 'Customer updated successfully!');
    }
}
