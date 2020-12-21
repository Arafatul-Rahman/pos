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
//user
Route::group(['namespace' => 'backEnd\user', 'as'=>'user.'], function (){
	Route::get('login', 'userController@login')->name('login');
	Route::post('login', 'userController@postLogin')->name('login');
	Route::get('logout', 'userController@logout')->name('logout');
	Route::get('/userVarification/{id}', 'userVarifiController@userVarification');
	Route::post('/updatePassword/{id}', 'userVarifiController@updatePassword')->name('updatePassword');
	Route::get('/resetPassword', 'userController@resetPassword')->name('resetPassword');
	Route::post('/resetEmail', 'userController@resetEmail')->name('resetEmail');
	Route::get('/resetPasswordShow/{id}', 'userController@resetPasswordShow')->name('resetPasswordShow');
	Route::post('/updateResetPassword/{id}', 'userController@updateResetPassword')->name('updateResetPassword');

	Route::group(['middleware' => 'UserAuth'], function (){
		Route::get('/', 'userController@home')->name('home');

		//make own profile
		Route::get('/profile', 'profileController@getUser')->name('profile');
		Route::post('/updateProfile', 'profileController@updateProfile')->name('updateProfile');
		//admin user image
		Route::get('/userImage', 'profileController@userImage')->name('userImage');
		Route::post('/uplodeImage', 'profileController@uplodeImage')->name('uplodeImage');
		// Route::resource('users', 'UseruserController');
	});
});

//admin
Route::group(['namespace' => 'backEnd\admin','prefix' => 'admin', 'as'=>'admin.'], function (){

	Route::get('login', 'adminController@login')->name('login');
	Route::post('login', 'adminController@postLogin')->name('login');
	Route::get('logout', 'adminController@logout')->name('logout');
	Route::get('/resetPassword', 'adminController@resetPassword')->name('resetPassword');
	Route::post('/resetEmail', 'adminController@resetEmail')->name('resetEmail');
	Route::get('/resetPasswordShow/{id}', 'adminController@resetPasswordShow')->name('resetPasswordShow');
	Route::post('/updatePassword/{id}', 'adminController@updatePassword')->name('updatePassword');

	Route::group(['middleware' => 'AdminAuth'], function (){

		Route::get('/', 'adminController@redirectToLogin')->name('redirectToLogin');
		Route::get('/home', 'adminController@home')->name('home');

		//make own profile
		Route::get('/profile', 'profileController@getUser')->name('profile');
		Route::post('/updateProfile', 'profileController@updateProfile')->name('updateProfile');
		//admin user image
		Route::get('/userImage', 'profileController@userImage')->name('userImage');
		Route::post('/uplodeImage', 'profileController@uplodeImage')->name('uplodeImage');
		//add user
		Route::resource('users', 'userController');

	});
});

//provider
Route::group(['namespace' => 'backEnd\provider','prefix' => 'provider', 'as'=>'provider.'], function (){

	Route::get('login', 'providerController@login')->name('login');
	Route::post('login', 'providerController@postLogin')->name('login');
	Route::get('logout', 'providerController@logout')->name('logout');

	Route::group(['middleware' => 'ProviderAuth'], function (){

		Route::get('/', 'providerController@redirectToLogin')->name('redirectToLogin');
		Route::get('/home', 'providerController@home')->name('home');
		
		//make own profile
		Route::get('/profile', 'profileController@getUser')->name('profile');
		Route::post('/updateProfile', 'profileController@updateProfile')->name('updateProfile');
		//admin user image
		Route::get('/userImage', 'profileController@userImage')->name('userImage');
		Route::post('/uplodeImage', 'profileController@uplodeImage')->name('uplodeImage');
		Route::resource('users', 'userController');

	});

});