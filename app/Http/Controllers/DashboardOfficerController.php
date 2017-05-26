<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Clients\Officer;
use App\Models\Clients\OfficersPermission;
use App\Models\Clients\State;
use App\Models\Clients\Town;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DashboardOfficerController extends Controller
{
    public function index(Request $request, Client $client){
        return view('pages.dashboard.officer.index')->with(['client' => $client, 'officers'=>Officer::get()]);
    }

    public function create(Request $request, Client $client){
        return view ('pages.dashboard.officer.create')->with(['client' => $client, 'states' => State::get()]);
    }
    public function get(Request $request, Client $client, int $officer_id){
        $officer = Officer::find($officer_id);
        return view('pages.dashboard.officer.view')->with(['client' => $client, 'officer'=>$officer]);
    }
    public  function store(Request $request, Client $client){
        //dd($request);
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name'    => 'required',
            'email' => 'required',
            'state' => 'required',
            'town.*' => 'required|exists:mysql_client.towns,id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.client.dashboard.officer.create', ['id'=>$client->id])
                ->withErrors($validator)
                ->withInput();
        }
        //dd($request);
        $officer = Officer::create([
            'first_name'    => $request->input('first_name'),
            'last_name'     => $request->input('last_name'),
            'last_name'         => $request->input('last_name'),
            'email'          => $request->input('email'),
            'password'      => bcrypt('password')
        ]);
        foreach($request->input('town') as $town_id){

            if(!Town::find($town_id)){//$town_id = name (string)
                $town =  Town::create(['name' => $town_id, 'state_id' => $request->input('state')]);
                $town_id = $town->id;
            }
            OfficersPermission::create([
                'officer_id' => $officer->id,'town_id' => $town_id
            ]);
        }

        return redirect()->route('user.client.dashboard.officer.store', ['id'=>$client->id])->withInput(['createded'=>true]);
    }
}
