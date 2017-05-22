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
Route::post('/categorytalent','CategoryTalentController@store');

//Route::get('/categorytalent/{talent_id}',[
//    'before' => 'jwt-auth',
//    'use'=>'CategoryTalentController@update'
//]);


Route::get('/categorytalent/{talent_id}','CategoryTalentController@update');

Route::resource('category','CategoriesController');
Route::post('/test', 'UploadController@test');
Route::post('/test2', 'UploadController@test2');
Route::get('/categorymentor','CategoryMentorController@update');


Route::post('/signup','JWTAuth\SignUpController@signup');
Route::post('/login','JWTAuth\LoginController@login');
Route::get('/authenticate','JWTAuth\LoginController@getAuthenticatedUser');

Route::get('/categorysubscribe','CategorySubscribeController@store');
Route::get('/categoryunsubscribe','CategorySubscribeController@update');

