<?php

use Illuminate\Http\Request;

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
Route::post('/uploads/singleuploded','UploadController@single_upload');
Route::post('/categorytalent','CategoryTalentController@store');


Route::resource('category','CategoriesController');

Route::resource('initial_reviews','InitialReviewController');



//this is called for when the talent choose to be talent and he needs to upload three of his work
Route::post('/store_media','InitialReviewController@store_media');

//this is to store initial review of one mentor on one talent on all the three files uploaded
Route::post('/store','InitialReviewController@store');


//to get all media related to mentor and talent
Route::get('/get_media_for_initial_review/{category_talent_id}/{category_mentor_id}','InitialReviewController@get_media_for_initial_review');




