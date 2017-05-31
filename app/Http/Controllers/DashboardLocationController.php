<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Clients\State;
use App\Models\Clients\Town;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DashboardLocationController extends Controller
{

    public function states(Request $request, Client $client){
       // dd(State::with(['customers', 'officers'])->get());
        return view('pages.dashboard.location.states')->with([
            'states'=>State::get(),
            'client' => $client
        ]);
    }
    public function createState(Client $client){
        return view('pages.dashboard.location.state-create')->with(['client'=>$client]);
    }
    public function createTown(Client $client, $state_id){
        return view('pages.dashboard.location.town-create')->with(['client'=>$client, 'state_id' =>$state_id]);
    }
    public  function storeState(Request $request, Client $client){
        $validator = Validator::make($request->all(), [
            'states' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.client.dashboard.state.create', ['id'=>$client->id])
                ->withErrors($validator)
                ->withInput();
        }

        $states = explode("\r\n",$request->input('states'));
        $x = 0;
        foreach($states as $state) {
            if(State::where(['name' => $state])->get()->first())
                continue;
            if(State::create(['name' => trim($state)]))
                $x++;

        }
        return $x? '
            <script>
                swal({
                    title: "Success",
                    text:"'._t(":n State(s) were added", ['n' => $x]).'",
                    type: "success"
                 },
                 function(){
                     window.location.reload();
                });
            </script>
        ':
            '
            <script>
                swal({
                    title: "An Error Occurred",
                    text:"'._t("Provinces were  not added").'",
                    type: "error"
                 },
                 function(){
                    $("#myModal").find(".close").click();
                });
            </script>
        ';

    }
    public  function storeTown(Request $request, Client $client){
        $validator = Validator::make($request->all(), [
            'towns' => 'required',
            'state' => 'require|exists:mysql_client.state.id',
        ]);
        $state_id = $request->input('state_id');
        if ($validator->fails()) {
            return redirect()->route('user.client.dashboard.town.create', ['id'=>$client->id,'state'=> $state_id])
                ->withErrors($validator)
                ->withInput();
        }

        $towns = explode("\r\n",$request->input('towns'));
        $x = 0;

        foreach($towns as $town) {
            if(Town::where(['name' => $town, 'state_id'=>$state_id])->get()->first()){
                continue;
            }
            Town::create(['name' => trim($town), 'state_id' => $state_id]);
            $x++;
        }

        return ($x > 0)? '
            <script>
             swal({
                    title: _t("Success"),
                    text:"'._t(":n Town(s) were added", ['n' => $x]).'",
                    type: "success"
                 },
                 function(){
                    window.location.reload();
                });

            </script>
        ':
            '
            <script>
                swal({
                    title: _t("An Error Occurred"),
                    text:"'._t("Towns were  not added").'",
                    type: "error"
                 },
                 function(){
                    $("#myModal").find(".close").click();
                });
            </script>
        ';

    }
    public function editState(Client $client, $id){
        $state = State::find($id);
        return view('pages.dashboard.location.state-edit')->with(['client'=>$client, 'state' => $state]);
    }
    public  function updateState(Request $request, Client $client,$id){
        $state = State::find($id);
        if(!$state){
            return  '
            <script>
                swal({
                    title: _t("An Error Occurred"),
                    text:"'._t("The Province was  not found").'",
                    type: "error"
                 },
                 function(){
                    $("#myModal").find(".close").click();
                });
            </script>
        ';
        }
        $validator = Validator::make($request->all(), [
            'state' => 'required|sometimes:mysql_client.state,name'
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.client.dashboard.state.create', ['id'=>$client->id, 'state'=> $state->id])
                ->withErrors($validator)
                ->withInput();
        }

        $state->name = $request->input('state');
        $state->save();
        return '
            <script>
                //swal("'._t("Province name changed").'");
                window.location.reload();
            </script>
        ';
    }


    public function editTown(Client $client, $id){
        $town = Town::find($id);
        return view('pages.dashboard.location.town-edit')->with(['client'=>$client, 'town' => $town]);
    }

    public  function updateTown(Request $request, Client $client,$id){
        $town = Town::find($id);
        if(!$town){
            return  '
            <script>
                swal({
                    title: _t("An Error Occurred"),
                    text:"'._t("The Town was  not found").'",
                    type: "error"
                 },
                 function(){
                    $("#myModal").find(".close").click();
                });
            </script>
        ';
        }
        $validator = Validator::make($request->all(), [
            'town' => 'required|sometimes:mysql_client.town,name'
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.client.dashboard.town.edit', ['id'=>$client->id, 'town'=>$town->id])
                ->withErrors($validator)
                ->withInput();
        }

        $town->name = $request->input('town');
        $town->save();
        return '
            <script>
                //swal("'._t("Town was renamed").'");
                window.location.reload();
            </script>
        ';
    }

    function destroy(Request $request, Client $client){
        $states = $request->input('state');
        $towns = $request->input('town');

        if($towns) Town::destroy($towns);

        if($states) {
            foreach ($states as $state_id) {
                $state = State::find($state_id);
                if ($state and !$state->towns->toArray()) {
                    State::destroy($state_id);
                }
            }
        }
        return $this->states($request, $client);
    }

}
