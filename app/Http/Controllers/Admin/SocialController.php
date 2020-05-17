<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect($service){
        // dd('ss');
        return Socialite::driver($service)->redirect();
    }

    public function callback($service){
        // dd('sa');
        $user = Socialite::driver($service)->Stateless()->user();
        $existUser=Admin::whereEmail($user->getEmail())->first();
        if($existUser){
            auth('admin')->login($existUser);
            return redirect(url('admin/'));
        }
        Admin ::create([
            'name'=>$user->getName(),
            'email'=>$user->getEmail(),
            'password'=>bcrypt('admin123')
        ]);
        auth('admin')->login($existUser);
        $id=auth('admin')->user()->id;
        dd($id);
        return redirect(url('admin/{}'));
    }
}
