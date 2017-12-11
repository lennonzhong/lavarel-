<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| webApi Routes
|--------------------------------------------------------------------------
|
| Here is where you can register webApi routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your webApi!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
