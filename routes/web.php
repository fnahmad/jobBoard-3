<?php

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

Route::get('/', function() {
	return view('welcome');
});

Auth::routes();

Route::get('/confirm-account/{token}', 'UserController@verify');


Route::group(['prefix' => 'offers', 'middleware' => ['verifyUserInformations']], function() {
	Route::get('/', 'HomeController@index')->name('home');
});

Route::group(['prefix' => 'skills', 'middleware' => ['verifyUserInformations']], function() {
	Route::post('/', 'HomeController@index')->name('home');
});