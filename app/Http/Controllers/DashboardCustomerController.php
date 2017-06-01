<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Clients\Customer;
use App\Models\Clients\Email;
use App\Models\Clients\State;
use App\Models\Clients\Telephone;
use App\Models\Clients\Town;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DashboardCustomerController extends Controller
{
    public function index(Request $request, Client $client){

        return view('pages.dashboard.customer.index')->with(['customers'=>Customer::get(), 'client' =>$client]);
    }

    public function create(Request $request, Client $client){
        return view ('pages.dashboard.customer.create')->with(['client' => $client, 'states' => State::get()]);
    }
    public  function store(Request $request, Client $client){
        //dd($request);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email'    => 'required',
            'telephone'    => 'required',
            //'secondary_email' => 'required',
            'state' => 'required',
            'town' => 'required|sometimes:mysql_client.towns,id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.client.dashboard.customer.create', ['id'=>$client->id])
                ->withErrors($validator)
                ->withInput();
        }
        //dd($request);
        $state_id      = $request->input('state');
        $town_id        = $request->input('town');
        $secondary_email = $request->input('secondary_email');
        $telephone        = $request->input('telephone');
        $secondary_telephone  = $request->input('secondary_telephone');

        if(!State::find($state_id)){//$town_id = name (string)
            $state =  ToStatewn::create(['name' => $state_id]);
            $state_id = $state->id;
        }
        if(!Town::find($town_id)){//$town_id = name (string)
            $town =  Town::create(['name' => $town_id, 'state_id' => $state_id]);
            $town_id = $town->id;
        }

        $customer = Customer::create([
            'name'    => $request->input('name'),
            'primary_email'     => $request->input('email'),
            'primary_phone'     => $telephone,
            'town_id'           => $town_id
        ]);

        if($secondary_email) {
            Email::created([
                'email'         => $secondary_email,
                'user_id'       => $customer->id,
                'user_type'     => 'App\Models\Clients\Customer'
            ]);
        }
        if($secondary_telephone) {
            Telephone::created([
                'email'         => $secondary_telephone,
                'user_id'       => $customer->id,
                'user_type'     => 'App\Models\Clients\Customer'
            ]);
        }
        return redirect()->route('user.client.dashboard.officer.store', ['id'=>$client->id])->withInput(['createded'=>true]);
    }

    public function get(Request $request, Client $client, $customer_id)
    {
        $customer = Customer::find($customer_id);
        return view('pages.dashboard.customer.view')->with(['client' => $client, 'customer' => $customer]);
    }

    public function edit(Request $request, Client $client, $customer_id)
    {
        $customer = Customer::find($customer_id);
        return view('pages.dashboard.customer.edit')->with(['client' => $client, 'customer' => $customer]);
    }

    public  function update(Request $request, Client $client, $id){
        $customer = Customer::find($id);

        if($customer) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'telephone' => 'required',
                //'secondary_email' => 'required',
                'state' => 'required',
                'town' => 'required|sometimes:mysql_client.towns,id',
            ]);

            if ($validator->fails()) {
                return redirect()->route('user.client.dashboard.customer.create', ['id' => $client->id])
                    ->withErrors($validator)
                    ->withInput();
            }
            //dd($request);
            $state_id = $request->input('state');
            $town_id = $request->input('town');
            $secondary_email = $request->input('secondary_email');
            $secondary_telephone = $request->input('secondary_telephone');

            if (!State::find($state_id)) {//$town_id = name (string)
                $state = ToStatewn::create(['name' => $state_id]);
                $state_id = $state->id;
            }
            if (!Town::find($town_id)) {//$town_id = name (string)
                $town = Town::create(['name' => $town_id, 'state_id' => $state_id]);
                $town_id = $town->id;
            }

            $customer->name = $request->input('name');
            $customer->primary_email = $request->input('email');
            $customer->primary_phone = $request->input('telephone');
            $customer->town_id = $town_id;
            $customer->save();





            if($secondary_email) {
                $email = $customer->email()->first()->get();
                if (!$email) {
                    Email::created([
                        'email' => $secondary_email,
                        'user_id' => $customer->id,
                        'user_type' => 'App\Models\Clients\Customer'
                    ]);
                } else {
                    $email->email = $secondary_email;
                    $email->save();
                }
            }
            if($secondary_telephone) {
                $telephone = $customer->telephone()->first()->get();
                if (!$telephone) {
                    Telephone::created([
                        'email' => $secondary_telephone,
                        'user_id' => $customer->id,
                        'user_type' => 'App\Models\Clients\Customer'
                    ]);
                } else {
                    $telephone->telephone = $secondary_telephone;
                    $telephone->save();
                }
            }
        }
        return redirect()->route('user.client.dashboard.customer', ['id'=>$client->id, 'customer' => $customer])->withInput(['created'=>true]);
    }


}
