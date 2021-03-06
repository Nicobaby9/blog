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
	Route::get('/profile/edit/{userprofile}', 'UserProfileController@edit')->name('profile.edit');
	Route::patch('/profile/update/{userprofile}', 'UserProfileController@update')->name('profile.update');
});

Auth::routes();

Route::group(['prefix' => 'private', 'namespace' => 'Admin', 'middleware' => ['auth', 'rolecheck:99,1']], function() {


	Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');

	//POST
	Route::group(['prefix' => 'post'], function() {
		Route::get('recycle-bin', 'PostController@post_bin')->name('post.bin');
		Route::get('restore/{id}', 'PostController@restore')->name('post.restore');
		Route::delete('clean/{id}', 'PostController@clean')->name('post.clean');
		Route::patch('main-post/{id}', 'PostController@mainPost')->name('post.main.post');
	});

	//POST RESOURCE
	Route::resource('/post', 'PostController');

	//TAGS RESOURCE
	Route::resource('/tag', 'TagController')->only(['index', 'store', 'edit', 'update', 'destroy']);
	Route::get('/tag/search', 'TagController@search')->name('tag.search');

	//CATEGORY RESOURCE
	Route::resource('/category', 'CategoryController')->only(['index', 'store', 'edit', 'update', 'destroy']);
	Route::get('/category/search', 'CategoryController@search')->name('category.search');

	//REQUEST MAIN CONTENT
	Route::patch('/request-main-content/{id}', 'RequestMainContentController@updateMainContent')->name('request-main-content.updateMainContent');

	//ADMINISTRATOR
	Route::group(['prefix' => 'administrator', 'middleware' => 'rolecheck:99'], function() {
		Route::resource('/web-setting', 'WebSettingController');
		Route::resource('/contact-setting', 'ContactController');

		//MAIL
		Route::group(['prefix' => 'advice-mail'], function() {
			Route::get('/spam', 'AdviceMailController@spam')->name('advice-mail.spam');
			Route::get('/restore/{id}', 'AdviceMailController@restore')->name('advice-mail.restore');
			Route::delete('/clean/{id}', 'AdviceMailController@clean')->name('advice-mail.clean');
		});

		//USER && USER PROFILE
		Route::group(['prefix' => 'user'], function() {
			Route::get('/banned-List', 'UserController@bannedUser')->name('user.banned-list');
			Route::get('/unban/{id}', 'UserController@unban')->name('user.unban');
			Route::delete('/clean/{id}', 'UserController@clean')->name('user.clean');
			Route::get('/search', 'UserController@search')->name('user.search');
			Route::get('/banned-search', 'UserController@bannedSearch')->name('user-banned.search');
		});

		//RESOURCE
		Route::resource('/advice-mail', 'AdviceMailController');
		Route::resource('/user', 'UserController');

		//MAIN POST
		Route::get('/request-main-content', 'RequestMainContentController@index')->name('request-main-content.index');
		Route::patch('/request-main-content/{id}/update', 'RequestMainContentController@update')->name('request-main-content.update');
		Route::get('/request-main-content/{id}/detail', 'RequestMainContentController@detail')->name('request-main-content.detail');
		Route::delete('/request-main-content/{id}/delete', 'RequestMainContentController@destroy')->name('request-main-content.destroy');
	});
	
});