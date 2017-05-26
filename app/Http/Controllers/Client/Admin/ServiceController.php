<?php

namespace App\Http\Controllers\Client\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Clients\Service;
use Session;

class ServiceController extends Controller
{
    public function index()
    {
    	$services = Service::all();
        return view('client.admin.services',['services' => $services]);
    }

    public function getService(Request $request) {
        $service = Service::whereName($request->name)->first();

        return ($service)? $service->toArray():"new";
    }

    public function create()
    {
        return view('client.admin.new_service');
    }

    public function edit($id) {
        $service = Service::find($id)->toArray();
        return view('client.admin.edit_service',['service' => $service]);
    }

    public function update(Request $request, $id) {
        $service = Service::find($id);

        $this->validate($request, [
            'name' => 'required|string|max:100',
            'price' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'description' => 'required|string',
        ]);

        $service->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);
        return redirect()->action('Client\Admin\ServiceController@index')->with('status', 'Service updated successfully!');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100|unique:mysql_client.services',
            'price' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'description' => 'required|string',
        ]);

        Service::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->action('Client\Admin\ServiceController@index')->with('status', 'Service created successfully!');
    }
}
