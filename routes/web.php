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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'administrator', 'namespace' => 'Admin'], function() {
	Route::resource('/category', 'CategoryController');
	Route::resource('/tag', 'TagController');
	Route::resource('/post', 'PostController');
});
Auth::routes();