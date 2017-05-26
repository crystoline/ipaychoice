<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Clients\State;
use Illuminate\Http\Request;

class ClientDashboardApiController extends Controller
{
    public function cities(Client $client, int $id){
        $state = State::find($id);
        return $state->towns;
    }
}
