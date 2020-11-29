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
Route::group(['namespace' => 'backEnd\user', 'as'=>'user.'], function (){
		Route::get('login', 'userController@login')->name('login');
		Route::post('login', 'userController@postLogin')->name('login');
		Route::get('logout', 'userController@logout')->name('logout');

			Route::group(['middleware' => 'UserAuth'], function (){
				Route::get('/', 'userController@home')->name('home');
			});

	});


Route::group(['namespace' => 'backEnd\admin','prefix' => 'admin', 'as'=>'admin.'], function (){

	Route::get('login', 'adminController@login')->name('login');
	Route::post('login', 'adminController@postLogin')->name('login');
	Route::get('logout', 'adminController@logout')->name('logout');
	
		Route::group(['middleware' => 'AdminAuth'], function (){

			Route::get('/home', 'adminController@home')->name('home');
			Route::get('/users', 'userController@dashboard');
		});
});


Route::group(['namespace' => 'backEnd\provider','prefix' => 'provider', 'as'=>'provider.'], function (){

	Route::get('login', 'providerController@login')->name('login');
	Route::post('login', 'providerController@postLogin')->name('login');
	Route::get('logout', 'providerController@logout')->name('logout');

		Route::group(['middleware' => 'ProviderAuth'], function (){

			Route::get('/home', 'providerController@home')->name('home');
		});

});