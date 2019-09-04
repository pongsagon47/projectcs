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

Route::group([
    'as' => 'kidthuang.',
    'namespace' => 'Frontend'
],function () {

    Route::get('/', 'FrontEndController@index')->name('index');
    Route::get('/about-us', 'AboutUsController@index')->name('about-us');
    Route::get('/contact-us','ContactUsController@index')->name('contact-us');

    Route::group([
        'prefix' => 'production',
        'as' => 'production.'
    ], function (){
        Route::get('/','ProductionController@index')->name('index');
        Route::get('{id}/detail','ProductionController@detail')->name('detail');

    });

    Route::group([
        'prefix' => 'news',
        'as' => 'news.'
    ], function (){
        Route::get('{slug?}/','NewsController@index')->name('index');
        Route::get('{id}/content', 'NewsController@content')->name('content');

    });


});

Route::get('/test', function () {
    return view('frontend.test');
});

Route::get('/testfrom', function () {
    return view('test');
});





