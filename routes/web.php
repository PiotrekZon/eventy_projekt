<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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


//panel aadmina
Route::get('/admin', function () {
    return view('admin');
    
});

//panel użytkownika
Route::get('/user', function () {
    return view('user');
    
});


Auth::routes();

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');


Auth::routes();

Route::get('/user', [App\Http\Controllers\UserController::class, 'user'])->name('user');



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/kino', [App\Http\Controllers\CategoryController::class, 'kino'])->name('kino');

Auth::routes();

Route::get('/teatr', [App\Http\Controllers\CategoryController::class, 'teatr'])->name('teatr');

Auth::routes();

Route::get('/koncert', [App\Http\Controllers\CategoryController::class, 'koncert'])->name('koncert');

Auth::routes();

Route::get('/archiwum', [App\Http\Controllers\CategoryController::class, 'archiwum'])->name('archiwum');



Auth::routes();

Route::get('/rents/{id?}', [App\Http\Controllers\RentController::class, 'show'], function ($id = null) {
    return $id;
})->name('rents');

//Route::post('/rents', 'RentController@create')->name('rents.create');
Route::post('/rents', [App\Http\Controllers\RentController::class, 'create'])->name('rents.create');

