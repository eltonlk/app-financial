<?php

use Illuminate\Http\Request;

Route::group([
    'middleware' => 'cors',
    'as'         => 'api.'
], function () {
    Route::post('access_token', 'Api\AuthController@accessToken')->name('access_token');
    Route::post('refresh_token', 'Api\AuthController@refreshToken')->name('refresh_token');

    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::post('revoke_token', 'Api\AuthController@revokeToken')->name('revoke_token');

        Route::get('user', function (Request $request) {
            $user = Auth::guard('api')->user();

            return $user;
        })->name('user');
    });
});
