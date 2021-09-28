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
    Route::resource('contests','ContestController');
    Route::get('panUser/{id}','UserController@panUser')->name('user.pan');
    Route::get('unpanUser/{id}','UserController@unpanUser')->name('user.unpan');

    Route::get('only-contests','ContestController@contests')->name('only-contests');
    Route::get('only-activites','ContestController@activites')->name('only-activites');
    Route::get('admin/profile','AdminController@profile')->name('admin.show');
    Route::post('admin/profile','AdminController@store')->name('admin.update');
    Route::get('show_notify/{id}','UserController@show_notify')->name('show_notify');


    Route::get('painduser','UserController@paindUser')->name('user.paned');

    Route::get('get_all_users','UserController@user' )->name('users.user');
    Route::get('get_all_famous','UserController@famous' )->name('users.famous');
    Route::post('verfy_account','UserController@verfy_account' )->name('users.verfy_account');
    Route::post('genereal','GeneralController@update' )->name('genereal.store');
    Route::get('genereal','GeneralController@general' )->name('genereal.index');
    Route::get('get_mail_setting','GeneralController@get_mail_setting' )->name('get_mail_setting');
    Route::get('get_nexmo_setting','GeneralController@get_nexmo_setting' )->name('get_nexmo_setting');
    Route::get('get_firebase_setting','GeneralController@get_firebase_setting' )->name('get_firebase_setting');

    Route::post('env_key_update','GeneralController@env_key_update' )->name('env_key_update.update');


    

    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.dashboard');


});
// Auth::routes();
Route::group(['prefix' => 'dashbaord'], function() {
    Route::get('/login','AdminController@get_login' )->name('get_login');
    Route::post('/login','AdminController@post_login' )->name('post_login');
    

});


Route::get('/', 'HomeController@index');
Route::get('create_user_activiry/{id}','Api\ContestController@create_user_activiry')->name('api.create_user_activiry');  
Route::post('subscribe_actitvty','Api\ContestController@subscribe_actitvty')->name('api.subscribe_actitvty');  
