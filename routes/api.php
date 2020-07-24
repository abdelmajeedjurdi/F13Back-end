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
Route::get('/admin','AdminController@index');
Route::get('/admin/{id}','AdminController@show');
Route::post('/admin','AdminController@store');
Route::delete('/admin/{id}','AdminController@destroy');

Route::get('/user','UserController@index');
Route::get('/user/{id}','UserController@show');
Route::post('/user','UserController@store');
Route::delete('/user/{id}','UserController@destroy');
Route::put('/user/{id}','UserController@update');

Route::get('/table','TableController@index');
Route::get('/table/{id}','TableController@show');
Route::post('/table','TableController@store');
Route::delete('/table/{id}','TableController@destroy');
Route::put('/table/{id}','TableController@update');

Route::get('/reservation','ReservationController@index');
Route::get('/reservation/{id}','ReservationController@show');
Route::post('/reservation','ReservationController@store');
Route::delete('/reservation/{id}','ReservationController@destroy');
Route::patch('/reservation/{id}','ReservationController@confirmed');


