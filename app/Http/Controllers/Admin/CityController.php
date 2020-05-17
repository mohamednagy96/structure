<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Redirect;

class CityController extends Controller
{
    public function __construct(){
        $this->middleware('permission:cities_list')->only(['index']);
        $this->middleware('permission:cities_create')->only(['create','store']);
        $this->middleware('permission:cities_edit')->only(['edit','update']);
        $this->middleware('permissiom:cities_delete')->only('destory');
    }
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Country $country)
    {
        $cities=$country->cities;
        return view('admin.pages.cities.index',compact('cities','country'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Country $country)
    {
        return view('admin.pages.cities.create',compact('country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Country $country)
    {
        $country->cities()->create($request->all());
        return $this->redirectRouteWithSuccessStore('admin.cities.index', $country->id);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country,City $city)
    {
        return view('admin.pages.cities.edit',compact('city','country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country , City $city)
    {
        $city->update($request->all());
        return $this->redirectRouteWithSuccessUpdate('admin.cities.index', $country->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country , City $city)
    {
        $city->delete();
        return $this->redirectRouteWithSuccessDelete('admin.cities.index', $country->id);
    }
}
