<?php

use Illuminate\Http\Request;

Route::group([
    'middleware' => 'cors',
    'as'         => 'api.',
    'namespace'  => 'Api'
], function () {
    Route::post('access_token', 'AuthController@accessToken')->name('access_token');
    Route::post('refresh_token', 'AuthController@refreshToken')->name('refresh_token');

    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::resource('bank_accounts', 'BankAccountsController', [
            'except' => [ 'create', 'edit' ]
        ]);

        Route::resource('banks', 'BanksController', [
            'only' => [ 'index' ]
        ]);

        Route::resource('bills', 'BillsController', [
            'except' => [ 'create', 'edit' ]
        ]);

        Route::resource('categories', 'CategoriesController', [
            'except' => [ 'create', 'edit' ]
        ]);

        Route::post('revoke_token', 'AuthController@revokeToken')->name('revoke_token');

        Route::get('user', function (Request $request) {
            $user = Auth::guard('api')->user();

            return $user;
        })->name('user');
    });
});
