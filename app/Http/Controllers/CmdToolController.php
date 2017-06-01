<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CmdToolController extends Controller
{
    public function index(){

    return $this->view();

    }

    public function exec(Request $request){
        if($request->input('cmd')) {
            $params = [];
            $vs = $request->input('paramValue');
            $ps = $request->input('param');
            if(!empty($ps) and !empty($vs)){
                foreach($ps as $i =>$p){
                   if(empty($vs[$i])) continue;
                    @$params[$p] = $vs[$i];
                }
            }
            Artisan::call($request->input('cmd'), $params);
            return nl2br(Artisan::output());
        }
    }

    private function view(){

        return '
        <iframe name="output" style="width: 100%"></iframe>
<form method="post" target="output" style="max-width: 385px">
'.csrf_field().'
    <fieldset>
        <legend>Run Commands</legend>
        <label>Command <br>
            <input name="cmd" value="'.old('cmd').'">
        </label><br>
        <label>Parameters</label><br>
        <label>
            <input name="param[]" value="">
        </label>
        <label>
            <input name="paramValue[]" value="">
        </label><hr>
        <label>
            <input name="param[]" value="">
        </label>
        <label>
            <input name="paramValue[]" value="">
        </label><hr>
        <label>
            <input name="param[]" value="">
        </label>
        <label>
            <input name="paramValue[]" value="">
        </label>
    </fieldset>
    <button type="submit">Run</button>
</form>
        ';
    }
}
