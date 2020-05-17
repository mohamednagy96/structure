<?php

use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes(['register' => false]);

Route::namespace('Admin\Auth')->name('admin.')->prefix('admin')->group(function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login.show');
    Route::post('login', 'LoginController@login')->name('login');
});
Route::post('admin/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');



Route::get('redirect/{service}','Admin\SocialController@redirect');
Route::get('callback/{service}','Admin\SocialController@callback');

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

Route::get('test' , function(){
    // Cache::put('langs', ['ar', 'en']);
    $value = Cache::get('langs');
    return $value;
});


Route::get('categories',function(){
    $categories=Category::all();
    return $categories;
});

Route::get('cache_category',function(){
    Cache::put('categories', DB::table('categories')->get(), Carbon::now()->addMinutes(10));
    $value=Cache::get('categories');
    return $value;
//     $value = Cache::remember('users', now()->addMinutes(10), function () {
//         return DB::table('users')->get();
//     });

});

Route::get('aa',function(){

    $value = Cache::remember('sss', now()->addMinutes(10), function()
    {
        return DB::table('categories')->get();
    });
    return $value;

});