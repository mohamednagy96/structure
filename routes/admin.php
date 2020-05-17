<?php

use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\App;

/**
 * Home page
 */
Route::get('/', 'HomeController@index')->name('home');

/**
 * admin users
 */
Route::resource('admin_users', 'AdminUserController')->except(['show']);

/**
 * roles
 */
Route::resource('roles', 'RoleController')->except(['show']);


/**
 * About
 */
Route::resource('aboutus', 'AboutUsController');

/**
 * setting
 */
Route::get('settings', 'SettingController@index')->name('settings.index');

Route::post('setting/update','SettingController@update')->name('settings.update');

/**
 * media
 */
Route::post('media/{media}', 'MediaController@store')->name('media.store');
Route::delete('media/{media}', 'MediaController@destroy')->name('media.destroy');

/**
 * Contact Us
 */
Route::resource('contacts','ContactController');

/**
 * countries
 */
Route::resource('countries','CountryController');
/**
 * city
 */
Route::resource('countries/{country}/cities','CityController');

/**
 * Languages
 */
Route::resource('languages', 'LanguageController')->except('show');



/**
 * customers
 */
Route::resource('customers','CustomerController');

