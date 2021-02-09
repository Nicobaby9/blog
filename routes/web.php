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

// Route::get('/blog/home', 'Frontend\BlogController@home')->name('homie');
Route::get('/', 'Frontend\BlogController@index')->name('index');
Route::get('/about-us', 'Frontend\BlogController@about')->name('about');
Route::get('/contact', 'Frontend\BlogController@contact')->name('contact');
Route::get('/post/{post}', 'Frontend\BlogController@show')->name('blog.show');
Route::get('/category/{category}', 'Frontend\BlogController@category')->name('blog.category');
Route::get('/tag/{tag}', 'Frontend\BlogController@tag')->name('blog.tag');
Route::get('/search', 'Frontend\BlogController@search')->name('blog.search');
Route::get('/category', 'Frontend\BlogController@listCategory')->name('list.category');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/send-mail', 'Admin\AdviceMailController@sendMail')->name('send.mail');

Route::group(['middleware' => 'auth'], function() {
	Route::post('/comment/store', 'Frontend\CommentController@commentStore')->name('comment.add');
	Route::get('/profile/{userprofile}', 'Frontend\BlogController@profile')->name('profile.info');
	Route::post('/reply/store', 'Frontend\CommentController@replyStore')->name('reply.add');
	Route::resource('/profile', 'UserProfileController');
});

Auth::routes();

Route::group(['prefix' => 'administrator', 'namespace' => 'Admin', 'middleware' => 'auth'], function() {
	Route::resource('/web-setting', 'WebSettingController');
	Route::resource('/contact-setting', 'ContactController');
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

	//POST
	Route::get('/post-recycle-bin', 'PostController@post_bin')->name('post.bin');
	Route::get('/post-restore/{id}', 'PostController@restore')->name('post.restore');
	Route::delete('/post-clean/{id}', 'PostController@clean')->name('post.clean');
	Route::patch('/post-main-post/{id}', 'PostController@mainPost')->name('post.main.post');

	//MAIL
	Route::get('/mail-spam', 'AdviceMailController@spam')->name('mail.spam');
	Route::get('/mail-restore/{id}', 'AdviceMailController@restore')->name('mail.restore');
	Route::delete('/mail-clean/{id}', 'AdviceMailController@clean')->name('mail.clean');

	Route::resource('/category', 'CategoryController');
	Route::resource('/mail', 'AdviceMailController');
	Route::resource('/post', 'PostController');
	Route::resource('/tag', 'TagController');
	Route::resource('/user', 'UserController');
});