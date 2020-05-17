<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserRequest;
use App\Http\Resources\ProfileResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile(){
        return new ProfileResource(auth()->user());
    }


    public function update(UserRequest $request){

        $user = auth()->user(); //return user

        $input = $request->all();

        $input['password'] = $request->password ? Hash::make($request->password) : $user->password;

        $user->update($input);

        return $this->successResponse();
    }
}
