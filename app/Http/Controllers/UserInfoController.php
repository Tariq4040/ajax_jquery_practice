<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;

class UserInfoController extends Controller
{
    public function userinfo(){
        $countries = Country::get();
        $states = State::get();
        return view('index')->with((['countries' =>$countries , 'states' =>$states]));
    }
}
