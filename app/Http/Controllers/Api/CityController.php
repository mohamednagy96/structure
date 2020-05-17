<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CityController extends Controller
{
    public function index(){
        $cities = Cache::remember('cities' , now()->addHours(24) , function(){
            return City::all();
        });

        return CityResource::collection($cities);
    }
}
