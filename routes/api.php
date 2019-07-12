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

Route::get('/posts', 'RestApiModelController@index');
Route::post('/posts', 'RestApiModelController@store');
Route::get('/posts/{id}', 'RestApiModelController@show');
Route::put('/posts/{id}/update', 'RestApiModelController@update');
Route::delete('/posts/{id}/delete', 'RestApiModelController@destroy');