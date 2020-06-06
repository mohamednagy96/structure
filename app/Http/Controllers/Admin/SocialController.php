<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Response;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect($service){
        // dd('ss');
        return Socialite::driver($service)->redirect();
    }

    public function callback($service){
        $user = Socialite::driver($service)->Stateless()->user();
        // dd($user);
         $existUser=Admin::whereEmail($user->getEmail())->first();
        if($existUser){
            auth('admin')->login($existUser);
            return redirect(url('admin'));
        }
       $existUser= Admin ::create([
            'name'=>$user->getName(),
            'email'=>$user->getEmail(),
            'password'=>bcrypt('admin123')
        ]);
        auth('admin')->login($existUser);
        return redirect(url('admin'));
    }
}
