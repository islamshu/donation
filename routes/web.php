<?php

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



Route::group(['middleware' => ['auth:admin'],'prefix' => 'dashbaord'], function() {
   

    Route::resource('city', CityController::class);
    Route::get('/logout','AdminController@logout' )->name('admin.logout');
    Route::resource('users','UserController' );
    Route::resource('pages','PageController' );

    Route::get('get_all_users','UserController@user' )->name('users.user');
    Route::get('get_all_famous','UserController@famous' )->name('users.famous');
    Route::post('verfy_account','UserController@verfy_account' )->name('users.verfy_account');
    Route::post('genereal','GeneralController@update' )->name('genereal.store');
    Route::get('genereal','GeneralController@general' )->name('genereal.index');


    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.dashboard');


});
// Auth::routes();
Route::group(['prefix' => 'dashbaord'], function() {
    Route::get('/login','AdminController@get_login' )->name('get_login');
    Route::post('/login','AdminController@post_login' )->name('post_login');
    

});


Route::get('/', function () {
    return redirect()->route('admin.dashboard');
    });