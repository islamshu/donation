<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('register-famous', 'Api\UserController@register_famous');
Route::post('register-user', 'Api\UserController@register_user');

Route::post('verfiy_account', 'Api\UserController@verfiy_account');
Route::post('login', 'Api\UserController@login');
Route::post('forgit', 'Api\UserController@forgit');
Route::post('reset', 'Api\UserController@reset');

Route::prefix('famous')->middleware('is_famous')->group(function () {
Route::resource('contest','Api\ContestController');
Route::post('create_contest','Api\ContestController@store');
Route::post('contest_update','Api\ContestController@update');
Route::post('more_info','Api\UserController@more_info');
Route::post('verfiy_account_famous','Api\UserController@verfiy_account_famous');
Route::post('choceWineer_activity','Api\ContestController@choceWineer_activity');
Route::post('choceWineer_contest','Api\ContestController@choceWineer');




});

Route::prefix('user')->group(function () {
    // Route::resource('contest','Api\ContestController')->only('index','show');
    Route::get('get_all_contest','Api\ContestController@get_all_contest');
    Route::get('get_all_activity','Api\ContestController@get_all_activity');

    Route::get('show_contect/{id}','Api\ContestController@show');

    Route::post('subsrcibe','Api\ContestController@subscribe');
    Route::post('edit-profile','Api\UserController@edit_profile');  
    Route::get('show_profile','Api\UserController@show_profile');  
    Route::post('change_password','Api\UserController@change_password');  
    Route::get('create_user_activiry/{id}','Api\ContestController@create_user_activiry')->name('api.create_user_activiry');  
    Route::post('subscribe_actitvty','Api\ContestController@subscribe_actitvty')->name('api.subscribe_actitvty');  
    Route::get('my_contest','Api\ContestController@my_contest')->name('api.my_contest');  
 
});
    Route::get('get_all_cities','Api\GeneralController@get_all_cities');
    Route::get('genereal_info','Api\GeneralController@Genereal_info');
    Route::get('page/{id}','Api\GeneralController@page');


// Contest

