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

Route::get('/', 'HomeController@index')->name('landing');

/**
 * WORK
 */
Route::group(['prefix' => 'works', 'middleware' => ['verifyUserInformations']], function() {
	Route::get('/', 'WorkController@index')->name('works.index');
	Route::get('/detail/{slug}', 'WorkController@show')->name('works.show');
	Route::get('/edit/{slug}', 'WorkController@edit')->name('works.edit');
	Route::post('/edit/{slug}', 'WorkController@update')->name('works.update');
	Route::get('/new', 'WorkController@create')->name('works.create');
	Route::post('/new', 'WorkController@store')->name('works.store');
	Route::get('/delete/{slug}', 'WorkController@delete')->name('works.delete');
});

/**
 * SKILLS
 */
Route::group(['prefix' => 'skills', 'middleware' => ['verifyUserInformations']], function() {
	Route::get('/', 'SkillController@index')->name('home');
});

/**
 * USER
 */
Auth::routes();
Route::get('/confirm-account/{token}', 'UserController@verify');
Route::group(['prefix' => 'user', 'middleware' => ['verifyUserInformations']], function() {
	Route::get('/', 'UserController@index')->name('user.index');
	Route::post('/', 'UserController@update')->name('user.update');
});

/**
 * BACK-OFFICE
 */
Route::group(['prefix' => 'admin', 'middleware' => ['verifyUserInformations']], function() {
	Route::get('/', 'Admin\HomeController@index')->name('admin.index');
	Route::get('/works', 'Admin\WorkController@index')->name('admin.works.index');
	Route::get('/users', 'Admin\UserController@index')->name('admin.users.index');
});

/**
 * API
 */
Route::group(['prefix' => 'api', 'middleware' => ['auth', 'VerifyAdmin']], function() {
	Route::post('/works/new', 'Admin\WorkController@store')->name('api.works.store');
	Route::patch('/works/{slug}', 'Admin\WorkController@update')->name('api.works.update');
	Route::delete('/works/{slug}', 'Admin\WorkController@delete')->name('api.works.delete');

	Route::post('/users/new', 'Admin\UserController@store')->name('api.users.store');
	Route::patch('/users/{id}', 'Admin\UserController@update')->name('api.users.update');
	Route::delete('/users/{id}', 'Admin\UserController@delete')->name('api.users.delete');

	Route::post('/skills/new', 'Admin\SkillController@store')->name('api.skills.store');
	Route::patch('/skills/{id}', 'Admin\SkillController@update')->name('api.skills.update');
	Route::delete('/skills/{id}', 'Admin\SkillController@delete')->name('api.skills.delete');
});