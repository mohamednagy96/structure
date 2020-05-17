<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Language;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    public function __construct(){
        $this->middleware('permission:countries_list')->only(['index']);
        $this->middleware('permission:countries_create')->only(['create','store']);
        $this->middleware('permission:countries_edit')->only(['edit','update']);
        $this->middleware('permissiom:countries_delete')->only('destory');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries=Country::paginate(15);
        return view('admin.pages.countries.index',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages=Language::pluck('name','id')->toArray();
        return view('admin.pages.countries.create',compact('languages'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $country=Country::Create($request->all());
        return redirect()->route('admin.countries.index')->with('success', 'Data is Saved .. !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country=Country::findOrFail($id);
        $languages=Language::pluck('name','id')->toArray();
        return view('admin.pages.countries.edit',compact('country','languages'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $country=Country::findOrFail($id);
        $country->update($request->all());
        return redirect()->route('admin.countries.index')->with('success', 'Data is Updated .. !!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country=Country::findOrFail($id);
        $country->delete();
        return redirect()->route('admin.countries.index');
    
    }
}
