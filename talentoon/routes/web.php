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
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('posts','AdminController@posts')->name('admin.posts');
  Route::get('posts/{id}','AdminController@deletePost')->name('admin.posts.destroy');
  Route::get('posts/{id}/edit','AdminController@editPost')->name('admin.posts.edit');
  Route::put('posts/{id}','AdminController@updatePost')->name('admin.posts.update');

});
Route::get('/uploads/multiple','UploadController@uploded');
Route::post('/uploads/multipleuploded','UploadController@multiple_upload');


Route::get('post/like/{id}', ['as' => 'post.like', 'uses' => 'LikeController@likePost']);
