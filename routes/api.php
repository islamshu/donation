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
Route::group(['middleware' => [ 'changeLanguage','header_request_env'], 'namespace' => 'Api'], function () {
    Route::post('register-famous', 'UserController@register_famous');
Route::post('register-user', 'UserController@register_user');

Route::post('verfiy_account', 'UserController@verfiy_account');
Route::post('login', 'UserController@login');
Route::post('forgit', 'UserController@forgit');
Route::post('reset', 'UserController@reset');
});
Route::group(['middleware' => [ 'changeLanguage','header_request_env','is_login'], 'namespace' => 'Api'], function () {
    




Route::prefix('famous')->middleware('is_famous')->group(function () {
Route::post('create_contest','ContestController@store');
Route::post('contest_update','ContestController@update');
Route::post('more_info','UserController@more_info');
Route::post('verfiy_account_famous','UserController@verfiy_account_famous');
Route::post('choceWineer_activity','ContestController@choceWineer_activity');
Route::post('choceWineer_contest','ContestController@choceWineer');
Route::post('contest/edit','ContestController@edit');
Route::get('my_contects','ContestController@my_contects');
Route::get('my_activites','ContestController@my_activites');






});

Route::prefix('user')->group(function () {
    // Route::resource('contest','ContestController')->only('index','show');
    Route::get('get_all_contest','ContestController@get_all_contest');
    Route::get('get_all_activity','ContestController@get_all_activity');

    Route::get('show_contect/{id}','ContestController@show');

    Route::post('subsrcibe','ContestController@subscribe');
    Route::post('edit-profile','UserController@edit_profile');  
    Route::get('show_profile','UserController@show_profile');  
    Route::post('change_password','UserController@change_password');  
    Route::get('my_contest','ContestController@my_contest')->name('api.my_contest');  
    Route::get('my_activity','ContestController@my_activity')->name('api.my_activity');  

    Route::get('my_contest_winner','ContestController@my_contest_winner')->name('api.my_contest_winner');  

    
    Route::get('get_notofication','UserController@get_notofiaction');
    Route::post('search','ContestController@search');

    Route::get('logout','UserController@logout');

    
});
    Route::get('get_all_cities','GeneralController@get_all_cities');
    Route::get('genereal_info','GeneralController@Genereal_info');
    Route::get('page/{id}','GeneralController@page');

});
// Contest

