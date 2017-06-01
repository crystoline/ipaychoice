<?php

namespace App\Http\Controllers\Client\Admin;

use App\Models\Clients\Officer;
use App\Models\Clients\OfficersPermission;
use App\Models\Clients\State;
use App\Models\Clients\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Session;

class OfficerController extends Controller
{
    public function index()
    {
        $officers = Officer::all();
        return view('client.admin.officers',['officers' => $officers]);
    }

    public function create()
    {
        $states = State::all();

        return view('client.admin.new_officer',['states' => $states]);
    }

    public function edit($id) {
        $states = State::all();
        $officer_col =  Officer::find($id);
        $officer = $officer_col->toArray();

        $permissions = $officer_col->permissions;

        $towns_array=[];
        foreach ($permissions as $p) {
            $towns_array[] = $p->town_id;
        }

        return view('client.admin.edit_officer',['officer' => $officer,'states' => $states,'towns_arr' => $towns_array]);
    }


    public function update(Request $request, $id) {

        $officer = Officer::find($id);

        $this->validate($request, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'town.*' => 'required|exists:mysql_client.towns,id',
        ]);

        $permissions = $officer->permissions;
        $towns_array=[];

        foreach ($permissions as $p) {
            $towns_array[] = $p->town_id;
        }

        foreach ($request->town as $town_id) {
            if (!in_array($town_id,$towns_array)) {
                OfficersPermission::create(['officer_id' => $officer->id, 'town_id' => $town_id]);
            }
        }
        foreach ($towns_array as $town_id) {
            if (!in_array($town_id, $request->town)) {
                OfficersPermission::where(['officer_id' => $officer->id, 'town_id' => $town_id])->delete();
            }
        }

        $officer->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);

        return redirect()->action('Client\Admin\OfficerController@index')->with('status', 'Cash Officer updated successfully!');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'town.*' => 'required|exists:mysql_client.towns,id',
        ]);

        $password = rand(10000, 99999);
        $officer = Officer::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($password)
        ]);

        foreach ($request->town as $town_id) {
            OfficersPermission::create([
                'officer_id' => $officer->id, 'town_id' => $town_id
            ]);
        }
        $config = Session::get('client.configuration');
        $client = $config->client;

        Mail::send('client.emails.officer', ['password' => $password, 'client' => $client, 'officer' => $officer], function ($m) use ($officer) {
            $m->from(env('MAIL_USERNAME'), env('APP_NAME'));
            $m->to($officer->email, $officer->first_name)->subject('Account Created on ' . env('APP_NAME'));
        });

        return redirect()->action('Client\Admin\OfficerController@index')->with('status', 'Cash officer created successfully!');
    }
}
