<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'web'])->group(function () {
    Route::get('/', 'HomeController@index')->name('dashboard');

    Route::resource('/users', 'UserController')->only(['index', 'store', 'destroy']);
    Route::resource('/messages', 'MessageController')->only(['index', 'store']);

    Route::view('/docs', 'documentation')->name('docs');
});

