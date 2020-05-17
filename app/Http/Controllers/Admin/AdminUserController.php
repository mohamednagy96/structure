<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminUserRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserController extends Controller
{

    protected $redirectRoute = 'admin.admin_users.index';

    private $roles;

    public function __construct()
    {
        $this->roles = Role::where('guard_name', 'admin')->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::orderBy('created_at', 'desc')->get();
        return view('admin.pages.adminUsers.index', [
            'admins' => $admins
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.adminUsers.create', [
            'roles' => $this->roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserRequest $request)
    {
        $request=$request->all();
        if(! isset($request['is_active'])){
            $request['is_active'] = 0;
        }
        $admin = Admin::create($request);
        $admin->assignRole($request['roles']);
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
        $admin = Admin::findOrFail($id);
        return view('admin.pages.adminUsers.edit', [
            'admin' => $admin,
            'roles' => $this->roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUserRequest $request, $id)
    {
        // dd($request->all());
        $admin = Admin::findOrFail($id);
        $request=$request->all();
        if(! isset($request['is_active'])){
            $request['is_active'] = 0;
        }else{
            $request['is_active'] = 1;
        }
        $admin->update($request);
        $admin->syncRoles($request['roles']);
        return $this->redirectRouteWithSuccessUpdate();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        if( auth()->guard('admin')->user()->id == $id){
            return $this->redirectRouteWithErrors('هذا الحساب خاص بك لا يمكنك حذفه');
        }
        $admin = Admin::findOrFail($id);

        $admin->delete();

        return $this->redirectRouteWithSuccessDelete();
    }
}
