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

Route::get('/', 'Frontend\BlogController@index')->name('home');
Route::get('/post/{post}', 'Frontend\BlogController@show')->name('blog.show');
Route::get('/category/{category}', 'Frontend\BlogController@category')->name('blog.category');
Route::get('/category', 'Frontend\BlogController@listCategory')->name('list.category');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['prefix' => 'administrator', 'namespace' => 'Admin', 'middleware' => 'auth'], function() {
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
	Route::get('/post-recycle-bin', 'PostController@post_bin')->name('post.bin');
	Route::get('/post-restore/{id}', 'PostController@restore')->name('post.restore');
	Route::delete('/post-clean/{id}', 'PostController@clean')->name('post.clean');
	Route::resource('/post', 'PostController');
	Route::resource('/tag', 'TagController');
	Route::resource('/category', 'CategoryController');
	Route::resource('/user', 'UserController');
});