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

Route::post('post/create', 'PostController@store');
Route::get('posts', 'PostController@index');
Route::delete('post/delete/{id}', 'PostController@delete');
Route::get('post/edit/{id}', 'PostController@single');
Route::post('post/update/{id}', 'PostController@update');
