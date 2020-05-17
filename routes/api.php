<?php
use Illuminate\Support\Facades\Route;

Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');

Route::apiResource('shippingMethod','ShippingMethodsController')->only(['index','show']);
Route::apiResource('paymentMethod','PaymentMethodsController')->only(['index','show']);
Route::apiResource('products','ProductController')->only(['index','show']);
Route::apiResource('categories','CategoryController')->only(['index']);
Route::apiResource('countries','CountryController')->only(['index','show']);

Route::apiResource('languages','LanguageController')->only(['index']);
Route::apiResource('settings','SettingController')->only(['index']);

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('user/profile', 'UserController@profile');
    //Route::apiResource('cart','CartController');
    Route::apiResource('checkout','CheckoutController')->only(['store']);
    Route::put('user/profile','UserController@update');
    Route::apiResource('wishlist','WishListController')->only(['index','store','destroy']);
    Route::apiResource('cart','CartController')->except(['update', 'show']);
    Route::apiResource('user/addresses','UserAddressController')->only(['index','show','update']);
    Route::apiResource('user/orders','UserOrderController')->only(['index','show','update']);

});
//Route::get('pr', 'CartController@getProductTotalPrice');
