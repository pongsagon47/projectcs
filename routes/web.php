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

});

Route::get('/map', function () {
    return view('testmap');
});




