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

Route::get('/', function(){
	return redirect()->route('signin.index');
});
Route::get('/signup', 'SignupController@index')->name('signup.index');
Route::post('/signup', 'SignupController@insert')->name('signup.insert');

Route::get('/signin', 'SigninController@index')->name('signin.index');
Route::post('/signin', 'SigninController@verify')->name('signin.verify');

Route::get('/forgetpassword', 'ForgetPasswordController@index')->name('forgetpassword.index');
Route::post('/forgetpassword', 'ForgetPasswordController@update')->name('forgetpassword.update');

Route::get('/signout', 'SignoutController@index')->name('signout.index');

//middleware

Route::group(['middleware' => ['signedin']], function(){

	Route::get('/dashboard', 'UserController@index')->name('user.index');

	Route::get('/user/profile', 'UserController@profile')->name('user.profile');
	Route::post('/user/profile/update', 'UserController@profileupdate')->name('user.profileupdate');

	Route::post('/dashboard/post', 'UserController@post')->name('user.post');
	Route::post('/dashboard/post/comment', 'UserController@comment')->name('user.comment');

	Route::get('/dashboard/post/edit', 'PostController@edit')->name('post.edit');
	Route::post('/dashboard/post/update', 'PostController@update')->name('post.update');
	Route::get('/dashboard/post/delete/{id}', 'PostController@delete')->name('post.delete');

Route::group(['middleware' => ['moderator']], function(){
   
	Route::get('/moderator-panel', 'ModeratorController@index')->name('moderator.index');
	Route::post('/moderator-panel/post/approve', 'ModeratorController@approve')->name('moderator.approve');
	Route::post('/moderator-panel/post/block', 'ModeratorController@block')->name('moderator.block');
	
	});
Route::group(['middleware' => ['admin']], function(){
		
	Route::get('/admin-panel', 'AdminController@index')->name('admin.index');
	Route::post('/admin-panel/user/approve', 'AdminController@approve')->name('admin.approve');
	Route::post('/admin-panel/user/block', 'AdminController@block')->name('admin.block');
	
	});
});