<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Clients\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DashboardServiceController extends Controller
{
    //
    public function index(Client $client){
        return view('pages.dashboard.service.index')->with(['services'=>Service::get(), 'client' => $client]);
    }
    public function get(Client $client, Service $service){

    }

    public function create(Request $request, Client $client){
        return view ('pages.dashboard.service.create')->with(['client' => $client]);
    }
    public  function store(Request $request, Client $client){
        $validator = Validator::make($request->all(), [
            'service' => 'required|unique:mysql_client.services,name',
            'price'     => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.client.dashboard.service.create', ['client'=>$client->id])
                ->withErrors($validator)
                ->withInput();
        }


        Service::create([
            'name' => $request->input('service'),
            'price' => $request->input('price')
        ]);

        return '
            <script>
                swal("'.__("Service was added").'");
                window.location.reload();
            </script>
        ';
    }
    public function edit(Client $client, $id){
        $service = Service::find($id);
        return view ('pages.dashboard.service.edit')->with(['client' => $client,'service'=>$service]);
    }
    public function update(Request $request,Client $client, $id){
        $validator = Validator::make($request->all(), [
            'service' => 'required|sometimes:mysql_client.services,name',
            'price'     => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.client.dashboard.service.edit', ['client'=>$client->id])
                ->withErrors($validator)
                ->withInput();
        }

        if($service = Service::find($id)){
            $service->name = $request->input('service');
            $service->price = $request->input('price');
            $service->save();
        };
        return '
            <script>
                swal("'.__("Service was updated").'");
                window.location.reload();
            </script>
        ';
    }

    public function destroy(Client $client, $id){
        if(Service::find($id)){
            Service::destroy($id);
        };

    }
}
