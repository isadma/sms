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

Route::middleware(['auth:api'])->name('api.')->group(function () {
    //for sms sender app
    Route::get('/conf', 'ConfController@conf')->name('conf');

    //for to send sms
    Route::post('/messages/store', 'MessageController@store')->name('message.store');
});
