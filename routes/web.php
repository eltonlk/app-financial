<?php

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

Route::get('app', function () {
    return view('layouts.app');
});

Route::group([
    'prefix' => 'admin',
    'as'     => 'admin.',
], function () {
    Auth::routes();

    Route::group([
        'middleware' => 'can:access-admin',
    ], function () {
        Route::get('/home', 'HomeController@index')->name('home');

        Route::get('/', 'Admin\BanksController@index')->name('root');

        Route::resource('banks', 'Admin\BanksController', [
            'except' => 'show',
        ]);
    });
});
