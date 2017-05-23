<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function create(){
        return view('pages.client-create');
    }
    public function store(Request $request){
        $this->validate($request, self::$rules);
        $client = new Client();
        $client->name = $request->input('name');
        $client->address = $request->input('address');
        $client->user_id = Auth()->user()->id;
        $client->save();

        return redirect()->action('HomeController@index');
    }

    public function edit(Request $request, Client $client){
        return view('pages.client-edit')->with(['client'=>$client]);
    }

    public function update(Request $request, Client $client){
        $this->validate($request, self::$rules);

        $client->name = $request->input('name');
        $client->address = $request->input('address');
        $client->save();

        return redirect()->action('HomeController@index');
    }
    protected static $rules = [
        'name' => 'required',
        //'eamil' => 'required'
    ];
}
