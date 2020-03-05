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
    'middleware' => 'auth',
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
        'namespace' => 'Merchant',
        'middleware' => 'user.active'
    ],function (){
        Route::get('/','ShopController@index')->name('index');
        Route::post('/order','ShopController@order')->name('order');
        Route::post('/order/store','ShopController@store')->name('store');
        Route::get('/index','ShopController@index')->name('index');

    });

    Route::group([
        'prefix' => 'order-status',
        'as' => 'order-status.',
        'namespace' => 'Merchant',
        'middleware' => 'user.active'
    ],function (){
        Route::get('/','OrderStatusController@index')->name('index');
        Route::get('{id}/bill','OrderStatusController@bill')->name('bill');
        Route::get('{id}/paypal','OrderStatusController@payDeposit')->name('payDeposit');
        Route::put('{id}/deposit','OrderStatusController@deposit')->name('deposit');
    });

    Route::group([
        'prefix' => 'report-order',
        'as' => 'report-order.',
        'namespace' => 'Report',
        'middleware' => 'user.active'
    ],function (){
        Route::get('/','ReportOrderController@index')->name('index');
        Route::get('{id}/bill','ReportOrderController@bill')->name('bill');
    });

    Route::group([
        'prefix' => 'product-list',
        'as' => 'product-list.',
        'namespace' => 'Merchant',
        'middleware' => 'user.active'
    ],function (){
        Route::get('/','ProductController@index')->name('index');
        Route::any('/search','ProductController@search')->name('search');
        Route::get('{id}/detail','ProductController@show')->name('show');
    });

});
