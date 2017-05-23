<?php

namespace App\Http\Controllers\Client\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Clients\Customer;
use App\Models\Clients\OfficersPermission;
use App\Models\Clients\Officer;
use App\Models\Clients\Town;
use Session;

class CustomerController extends Controller
{
    public function index()
    {
    	$customers = Customer::with('town')->get();
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
    	// dd($request);
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'primary_email' => 'required|unique:mysql_client.customers|email|max:255',
            'secondary_email' => 'sometimes|nullable|unique:mysql_client.emails,email|email|max:255',
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

        return redirect()->action('Client\Admin\CustomerController@index')->with('status', 'Profile updated!');
    }
}
