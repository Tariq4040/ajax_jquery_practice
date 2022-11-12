<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class UserInfoController extends Controller
{
    public function countryData(){
        $countries = Country::select('country_name','id')->get();
        // dd($countries);
        return view('index',compact('countries'));
    }

    public function stateData(Request $request)
    {
        // dd($request->country_id);
        $data['states'] = State::where("country_id",$request->country_id)->get(["state_name", "id"]);
        return response()->json($data);
    }
    public function cityData(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)->get(["city_name", "id"]);
        return response()->json($data);
    }
}
