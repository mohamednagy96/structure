<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Http\Resources\CountryResource;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CountryController extends Controller
{
    public function index(){
        $countries = Cache::remember('countries' , now()->addHours(24) , function(){
            return Country::get();
        });
        return CountryResource::collection($countries);
    }

    public function show($id){
        $cities = Country::FindOrFail($id)->cities;
        return CityResource::collection($cities);
    }
}
