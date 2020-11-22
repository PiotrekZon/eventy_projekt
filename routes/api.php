<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


//API dostępowe do bazy Eventów - Podstawowy routing
Route::middleware('auth:api')->get('/reservation', 'Api\ReservationController@getAll');
Route::middleware('auth:api')->get('/reservation/{id?}', 'Api\RentController@getAllByUser');
Route::middleware('auth:api')->get('/reservation/accept/{id?}', 'Api\RentController@accept');
Route::middleware('auth:api')->delete('/reservation/{id?}', 'Api\RentController@delete');
Route::middleware('auth:api')->post('/event/{id?}', 'Api\EventController@update');
Route::middleware('auth:api')->get('/event', 'Api\EventController@getAll');
Route::middleware('auth:api')->get('/event/{id?}', 'Api\EventController@getAllByUser');
Route::middleware('auth:api')->post('/event/store', 'Api\EventController@store');
Route::middleware('auth:api')->delete('/event/{id?}', 'Api\EventController@delete');
Route::middleware('auth:api')->post('/user/store', 'Api\UserController@store');
Route::middleware('auth:api')->get('/user', 'Api\UserController@getAll');
Route::middleware('auth:api')->get('/user/{id?}', 'Api\UserController@find');
Route::middleware('auth:api')->get('/reservation', 'Api\RentController@getAll');
Route::middleware('auth:api')->get('/reservation/{id?}', 'Api\RentController@getAllByEvent');
Route::middleware('auth:api')->get('/reservation/accept/{id?}', 'Api\RentController@accept');
Route::middleware('auth:api')->delete('/reservation/{id?}', 'Api\RentController@delete');
Route::middleware('auth:api')->post('/event/{id?}', 'Api\EventController@update');
Route::middleware('auth:api')->get('/event', 'Api\EventController@getAll');
Route::middleware('auth:api')->get('/event/{id?}', 'Api\EventController@getAllByUser');
Route::middleware('auth:api')->post('/event/store', 'Api\EventController@store');
Route::middleware('auth:api')->delete('/event/{id?}', 'Api\EventController@delete');
Route::middleware('auth:api')->post('/user/store', 'Api\UserController@store');
Route::middleware('auth:api')->get('/user', 'Api\UserController@getAll');
Route::middleware('auth:api')->get('/user/{id?}', 'Api\UserController@find');