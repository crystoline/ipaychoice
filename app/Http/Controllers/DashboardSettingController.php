<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardSettingController extends Controller
{

    public function edit(Client $client){
        return view('pages.dashboard.setting.index')->with(['client' => $client]);
    }
    public function update(Request $request, Client $client){
        $color = $request->input('color');
        $options = $client->options? :[];

        if(isset($color)){
            $options['color'] = $color;
        }
        if ($request->hasFile('logo')) {
            if($request->file('logo')->isValid()) {
                /*try {*/
                    $file = $request->file('logo');
                    $filename = $client->id.'_'.time() . '.' . $file->getClientOriginalExtension();
                    $path = Storage::putFileAs(
                        'public/client_logo', $request->file('logo'), $filename
                    );
                if(!empty($options['logo'])){
                    Storage::delete($options['logo']); //delete old file
                }
                $options['logo'] = $path; //assign new
               /* } catch (FileNotFoundException $e) {

                }*/
            }
        }
        $client->options = $options;

            $client->save();


        return redirect()->route('user.client.dashboard.setting', ['client' => $client]);
    }
}
