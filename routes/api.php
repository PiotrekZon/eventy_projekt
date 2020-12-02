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
Route::middleware('auth:api')->get('/rent', 'App\Http\Controllers\Api\RentController@getAll'); //pobieranie wszystkich zakupionych biletów
Route::middleware('auth:api')->get('/rent/{id?}', 'App\Http\Controllers\Api\RentController@getAllByEvent'); //pobieranie wszystkich rezerwacji dla konkretnego eventu
Route::middleware('auth:api')->get('/rent/accept/{id?}', 'App\Http\Controllers\Api\RentController@accept'); //akceptacja wypożyczenia przez administratora, czyli zmiana statusu na “2” – potwierdzoną rezerwację
Route::middleware('auth:api')->delete('/rent/{id?}', 'App\Http\Controllers\Api\RentController@delete'); //usunięcie rezerwacji
 
Route::middleware('auth:api')->post('/event/{id?}', 'App\Http\Controllers\Api\eventController@update'); //aktualizacja eventu
Route::middleware('auth:api')->get('/event', 'App\Http\Controllers\Api\eventController@getAll'); //pobranie wszystkich eventow
Route::middleware('auth:api')->get('/event/{id?}', 'App\Http\Controllers\Api\eventController@getAllByUser'); //pobranie wszystkich biletów konkretnego użytkownika
Route::middleware('auth:api')->post('/event/store', 'App\Http\Controllers\Api\eventController@store'); //dodanie nowego eventu do bazy
Route::middleware('auth:api')->delete('/event/{id?}', 'App\Http\Controllers\Api\eventController@delete'); //usunięcie eventu z bazy
 
Route::middleware('auth:api')->post('/user/store', 'App\Http\Controllers\Api\UserController@store'); //dodanie nowego użytkownika
Route::middleware('auth:api')->get('/user', 'App\Http\Controllers\Api\UserController@getAll'); //pobranie wszystkich użytkowników
Route::middleware('auth:api')->get('/user/{id?}', 'App\Http\Controllers\Api\UserController@find'); //pobranie danych użytkownika o konkretnym id
