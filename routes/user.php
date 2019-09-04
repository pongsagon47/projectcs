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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'prefix' => 'user',
    'namespace' => 'BackendUser'
],function () {

    Route::group([
        'prefix' => 'profile',
        'as' => 'users.',
    ],function (){
        Route::get('show','ProfileUserController@show')->name('show');
        Route::get('edit','ProfileUserController@edit')->name('edit');
        Route::put('update','ProfileUserController@update')->name('update');
    });

    Route::group([
        'prefix' => 'shop',
        'as' => 'shop.',
        'namespace' => 'Merchant'
    ],function (){
        Route::get('/','ShopController@index')->name('index');
        Route::post('/','ShopController@order')->name('order');

    });


});
