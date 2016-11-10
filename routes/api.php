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

Route::group([
    'middleware' => 'cors'
], function () {
    Route::post('login', 'Api\AuthController@login');

    Route::group([
        'middleware' => 'cors'
    ], function () {
        Route::post('logout', 'Api\AuthController@logout');

        Route::post('refresh_token', 'Api\AuthController@refreshToken');

        Route::get('user', function (Request $request) {
            $user = Auth::guard('api')->user();

            return $user;
        });
    });
});
