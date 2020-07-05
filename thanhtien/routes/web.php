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

Route::get('/', function () {
    return view('welcome');
});

// Route::group(['middleware'=>'guest'],function(){
//     Route::match(['get','post'],'login',['as'=>'login','uses'=>'LoginController@getlogin']);
// });
// Route::group(['middleware'=>'auth'],function(){
//     Route::get('get','index','HomeController@getindex');
// });


// Route::group(['middleware' => ['auth']], function()
// {
//     Route::get('index', 'HomeController@getIndex');     
// });
Route::get ('index','HomeController@getindex');
Route::get('edit','HomeController@edit');
Route::get('login','LoginController@getlogin');
Route::post('login','LoginController@postlogin');

Route::get ('logout','LogoutController@getlogout');

Route::get('register','RegisterController@getRegister');
Route::post('register','RegisterController@PostRegister');


Route::resource('ajax-crud', 'AjaxController');
Route::post('delete','HomeController@delete');
