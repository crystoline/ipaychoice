<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Clients\Officer;
use App\Models\Clients\OfficersPermission;
use App\Models\Clients\State;
use App\Models\Clients\Town;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class DashboardOfficerController extends Controller
{
    public function index(Request $request, Client $client)
    {
        return view('pages.dashboard.officer.index')->with(['client' => $client, 'officers' => Officer::get()]);
    }

    public function create(Request $request, Client $client)
    {
        return view('pages.dashboard.officer.create')->with(['client' => $client, 'states' => State::get()]);
    }

    public function get(Request $request, Client $client, $officer_id)
    {
        $officer = Officer::find($officer_id);
        return view('pages.dashboard.officer.view')->with(['client' => $client, 'officer' => $officer]);
    }

    public function store(Request $request, Client $client)
    {
        //dd($request);
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'state' => 'required',
            'town.*' => 'required|exists:mysql_client.towns,id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.client.dashboard.officer.create', ['id' => $client->id])
                ->withErrors($validator)
                ->withInput();
        }
        $password = rand(10000, 99999);
        $officer = Officer::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($password)
        ]);
        foreach ($request->input('town') as $town_id) {

            if (!Town::find($town_id)) {//$town_id = name (string)
                $town = Town::create(['name' => $town_id, 'state_id' => $request->input('state')]);
                $town_id = $town->id;
            }
            OfficersPermission::create([
                'officer_id' => $officer->id, 'town_id' => $town_id
            ]);
        }

        Mail::send('pages.dashboard.officer.created-mail', ['password' => $password, 'client' => $client, 'officer' => $officer], function ($m) use ($officer) {
            $m->from(env('MAIL_USERNAME'), env('APP_NAME'));
            $m->to($officer->email, $officer->first_name)->subject('Account Created on ' . env('APP_NAME'));
        });
        return redirect()->route('user.client.dashboard.officers', ['id' => $client->id])->with(['created' => true]);
    }


    public function edit(Client $client, $id)
    {
        $officer = Officer::find($id);
        return view('pages.dashboard.officer.edit')->with(['client' => $client, 'officer' => $officer]);
    }

    public function update(Request $request, Client $client, $id)
    {
        if ($officer = Officer::find($id)) {
            if($request->input('permission') and $towns_new = $request->input('towns') ) {

                $towns = $officer->townsArray;
                if($towns) {
                    foreach ($towns as $town) {
                        if (!in_array($town, $towns_new))
                            OfficersPermission::where(['officer_id' => $officer->id, 'town_id' => $town])->delete();
                    }
                }

                foreach($towns_new as $town){
                    if(!$towns or !in_array($town, $towns))
                        OfficersPermission::create(['officer_id'=> $officer->id, 'town_id' => $town]);
                }

            }else{
                $validator = Validator::make($request->all(), [
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'email' => 'required',
                ]);

                if ($validator->fails()) {
                    return redirect()->route('user.client.dashboard.officer.edit', ['client' => $client->id, 'officer' => $officer->id])
                        ->withErrors($validator)
                        ->withInput();
                }


                $officer->first_name = $request->input('first_name');
                $officer->last_name = $request->input('last_name');

                if ($officer->email == $request->input('email')) {
                    $officer->email = $request->input('email');
                    $officer->save();

                } else {
                    //$password = rand(10000, 99999); //to be removed
                    //$officer->password = $password; //to be removed
                    $officer->email = $request->input('email');
                    $officer->save();
                    //send mail;
                }
            }
        }
        return redirect()->route('user.client.dashboard.officer', ['client' => $client->id, 'officer'=>$officer->id]);
    }
}
