<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index(){
        //Ajax call to address
        $response = Http::get('http://api.ipify.org')->body();

        //Check if the current user is admin
        $user = Auth::user();
        if($user->isAdministrator()){
            //Get all objects from "objects" table
            $userObjects = Tool::all();
        } else {
            //Get only the current auth user objects from "objects" table
            $userObjects = Tool::where('user_id', $user->id)->get();
        }
        return view('dashboard',compact(['userObjects','response']));

    }
}
