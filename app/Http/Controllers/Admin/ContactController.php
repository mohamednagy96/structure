<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\ContactUs;
use App\Models\Service;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __contsruct(){
        $this->middlerware('permission:contact_list')->only(['index','show']);
        $this->middleware('permission:contact_create')->only(['create','store']);
        $this->middleware('permission:contact_update')->only(['edit','update']);
        $this->middleware('permission:contact_delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts=ContactUs::paginate(15);
        return view('admin.pages.contacts.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.contacts.create',['services'=>Service::pluck('name','id')->toArray()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
     $contact=ContactUs::create($request->all());
     return $this->redirectRouteWithSuccessStore();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact=ContactUs::findOrFail($id);
        return view('admin.pages.contacts.edit',['contact'=>$contact,'services'=>Service::pluck('name','id')->toArray()]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, $id)
    {
        $contact=ContactUs::findOrFail($id);
        $contact->update($request->all());
        return redirect()->route('admin.contacts.index')->with('success', 'Data is Update .. !!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact=ContactUs::findOrFail($id);
        $contact->delete();
        return back();
    }
}
