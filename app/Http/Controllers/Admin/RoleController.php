<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\Models\PermissionGroup;
use App\Models\Unit;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:roles_list')->only(['index']);
        $this->middleware('permission:roles_create')->only(['create', 'store']);
        $this->middleware('permission:roles_edit')->only(['edit', 'update']);
        $this->middleware('permission:roles_delete')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.roles.index', [
            'roles' => Role::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.roles.create',[
            'permissionGroups' => PermissionGroup::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
            'permissions' => 'required|array'
        ]);

        $role = Role::create([
            'name' => $request->name
        ]);

        $role->syncPermissions($request->permissions);


        return redirect()->route('admin.roles.index')->with('success', __('Create Successfully'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {

        return view('admin.pages.roles.edit', [
            'permissionGroups' => PermissionGroup::all(),
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        if($role->name == 'unit_admin'){
            return redirect()->route('admin.roles.index')->withErrors('Cant edit this role');
        }

        $request->validate([
            'name' => 'required|unique:roles,name,'.$role->id,
            'permissions' => 'required|array'
        ]);

        $role->update([
            'name' => $request->name
        ]);

        $role->syncPermissions($request->permissions);

        return redirect()->back()->with('success', __('Saved Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if(in_array($role->name, config('roles.roles'))){
            return redirect()->back()->withErrors('You cant delete this role');
        }

        if($role->users()->count() > 0){
            return redirect()->back()->withErrors(__('Can\'t delete this role becuse it used by some users'));
        }

        $role->delete();

        return redirect()->route('admin.roles.index')->with('success', __('Deleted Successfully'));
    }


}
