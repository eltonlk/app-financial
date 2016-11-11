<?php

use Illuminate\Http\Request;

Route::group([
    'middleware' => 'cors',
    'as'         => 'api.'
], function () {
    Route::post('login', 'Api\AuthController@login')->name('login');
    Route::post('refresh_token', 'Api\AuthController@refreshToken')->name('refresh_token');

    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::post('logout', 'Api\AuthController@logout')->name('logout');

        Route::get('user', function (Request $request) {
            $user = Auth::guard('api')->user();

            return $user;
        })->name('user');
    });
});
