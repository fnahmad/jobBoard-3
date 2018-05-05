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
	Route::get('/', 'WorkController@index')->name('offers.index');
	Route::get('/detail/{slug}', 'WorkController@show')->name('offers.show');
	Route::get('/edit/{slug}', 'WorkController@edit')->name('offers.edit');
	Route::post('/edit/{slug}', 'WorkController@update')->name('offers.update');
	Route::get('/new', 'WorkController@create')->name('offers.create');
	Route::post('/new', 'WorkController@store')->name('offers.store');
});

Route::group(['prefix' => 'skills', 'middleware' => ['verifyUserInformations']], function() {
	Route::get('/', 'SkillController@index')->name('home');
});
Route::group(['prefix' => 'user', 'middleware' => ['verifyUserInformations']], function() {
	Route::get('/', 'UserController@index')->name('user.index');
	Route::post('/', 'UserController@update')->name('user.update');
});