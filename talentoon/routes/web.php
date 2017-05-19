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

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('categories.posts','PostsController');
Route::resource('category','CategoriesController');
Route::resource('/posts','PostsController');


Route::get('/posts/create', 'PostsController@create');
Route::post('/posts/',['uses'=> 'PostsController@store','as'=>'post.store']);





Route::prefix('admin')->group(function(){
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');

  Route::resource('post','Admin\AdminPostController');

  // Route::get('post','AdminController@posts')->name('admin.post');
  // Route::DELETE('post{id}','AdminController@deletePost')->name('admin.post.destroy');
  // Route::get('post/{id}/edit','AdminController@editPost')->name('admin.post.edit');
  // Route::put('post/{id}','AdminController@updatePost')->name('admin.post.update');
  Route::get('/post/{id}/approve', 'Admin\AdminPostController@isApprove')->name('post.approve');
  Route::get('/post/{id}/unapprove', 'Admin\AdminPostController@unApprove')->name('post.unapprove');


});
Route::get('/uploads/multiple','UploadController@uploded');
Route::post('/uploads/multipleuploded','UploadController@multiple_upload');


Route::get('post/like/{id}', ['as' => 'post.like', 'uses' => 'LikeController@likePost']);
