<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct(){
        $this->middleware('permission:customers_list')->only(['index']);
        $this->middleware('permission:customers_create')->only(['create','store']);
        $this->middleware('permission:customers_edit')->only(['edit','update']);
        $this->middleware('permissiom:customers_delete')->only('destory');
    }
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=User::paginate(15);
        return view('admin.pages.customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.customers.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request=$request->all();
        if(! isset($request['is_active'])){
            $request['is_active'] = 0;
        }
        $request['password']=bcrypt('12345678');
        $customer=User::Create($request);
        return redirect()->route('admin.customers.index')->with('success', 'Data is Saved .. !!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer=User::findOrFail($id);
        return view('admin.pages.customers.edit',compact('customer'));

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
        $customer=User::findOrFail($id);
        $request=$request->all();
        if(! isset($request['is_active'])){
            $request['is_active'] = "0";
        }
        $customer->update($request);
        return redirect()->route('admin.customers.index')->with('success', 'Data is Updated .. !!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer=User::findOrFail($id);
        $customer->delete();
        return redirect()->route('admin.customers.index');

    }
}
