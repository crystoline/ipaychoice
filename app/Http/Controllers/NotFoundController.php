<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotFoundController extends Controller
{
    public function client(Request $request){
        return view('pages.not_found.client');
    }
}
