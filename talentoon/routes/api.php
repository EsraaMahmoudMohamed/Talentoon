<?php

use Illuminate\Http\Request;
//use Dingo\Api\Routing\Router;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('comment','CommentController');
Route::post('/uploads/singleuploded','UploadController@single_upload');
Route::post('/categorytalent',[
    'uses'=>'CategoryTalentController@store',
    'middleware'=> 'jwt.auth']);
Route::resource('categories.posts','PostsController');
Route::resource('categories.workshops', 'WorkShopsController');

//Route::get('/categorytalent/{talent_id}',[
//    'before' => 'jwt-auth',
//    'use'=>'CategoryTalentController@update'
//]);


Route::put('/categorytalent/{talent_id}','CategoryTalentController@update');

Route::resource('category','CategoriesController');


Route::resource('initial_reviews','InitialReviewController');



//this is called for when the talent choose to be talent and he needs to upload three of his work
Route::post('/store_media','InitialReviewController@store_media');

//this is to store initial review of one mentor on one talent on all the three files uploaded
Route::post('/store','InitialReviewController@store');


//to get all media related to mentor and talent
Route::get('/get_media_for_initial_review/{category_talent_id}/{category_mentor_id}','InitialReviewController@get_media_for_initial_review');


Route::post('/single_upload/{id}', 'UploadController@single_upload');

Route::post('/test2', 'UploadController@test2');
Route::put('/categorymentor/update','CategoryMentorController@update');
Route::post('/categorymentor/store','CategoryMentorController@store');

//Route::post('/signup','JWTAuth\SignUpController@signup');
Route::post('/signup','JWTAuth\SignUpController@register');
Route::post('/login','JWTAuth\LoginController@login');
Route::get('/authenticate','JWTAuth\LoginController@getAuthenticatedUser');

Route::post('/categorysubscribe','CategorySubscribeController@store');
Route::post('/categoryunsubscribe','CategorySubscribeController@update');

Route::post('/like','LikeController@store');
Route::post('/dislike','LikeController@update');



Route::post('/categorytalent/store','CategoryTalentController@store');


//Route::post('/posts/',['uses'=> 'PostsController@store','as'=>'post.store']);

Route::get('/countries','CountriesController@getAllCountries');

//Route for all initial posts and review
Route::get('/initial_posts/{mentor_id}','InitialReviewController@show_not_reviewed_initial_posts');
Route::post('/single_review','InitialReviewController@store_single_review');


Route::get('/post/{post_id}','PostsController@showSinglePost');

Route::post('/review_files_upload/{category_talent_id}', 'UploadController@review_files_upload');
