<?php

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

Route::namespace('Api')->group(function () {
    Route::middleware(['json'])->group(function () {
        Route::get('/members', 'MembersController@index');

        Route::get('/membership-statistics', 'MemberStatisticsController@index');
    });
});
