<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountriesController extends Controller
{
    public function getAllCountries() {
        $countries=Country::all();
        return response()->json([
            'status'=>'ok',
            'data'=>$countries
            
        ]);
    }
}
