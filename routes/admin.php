<?php

Route::get('/employee', function () {
    return redirect()->route('login.employee');
});

Route::get('register/employee', 'Employee\RegisterController@showRegistrationForm')->name('register.employee');
Route::post('register/employee', 'Employee\RegisterController@register');

Route::get('login/employee', 'Employee\LoginController@showLoginForm')->name('login.employee');
Route::post('login/employee', 'Employee\LoginController@login');
Route::post('logout/employee', 'Employee\LoginController@logout')->name('logout.employee');

Route::get('employee/password/reset', 'Employee\ForgotPasswordController@showLinkRequestForm')->name('emp.password.request');
Route::post('employee/password/email', 'Employee\ForgotPasswordController@sendResetLinkEmail')->name('emp.password.email');
Route::get('employee/password/reset/{token}', 'Employee\ResetPasswordController@showResetForm')->name('emp.password.reset');
Route::post('employee/password/reset', 'Employee\ResetPasswordController@reset')->name('emp.password.update');

Route::get('/employee/home', 'EmployeeCotroller@index')->name('employee.home');

Route::group([
    'prefix' => 'employee',
    'middleware' => 'employee:employee',
    'namespace' => 'BackendEmp'
],function (){

    Route::group([
        'prefix' => 'emp',
        'as' => 'emp.',
    ],function (){
        Route::get('show','ProfileEmpController@show')->name('show');
        Route::get('edit','ProfileEmpController@edit')->name('edit');
        Route::put('update','ProfileEmpController@update')->name('update');
    });

    Route::group([
        'prefix' => 'show',
        'as' => 'user.',
        'namespace' => 'CrudUser',
    ],function (){
        Route::get('user','UserController@index')->name('index');
        Route::any('search/user','UserController@search')->name('search');
        Route::get('user/create','UserController@create')->name('create');
        Route::post('user/store','UserController@store')->name('store');
        Route::get('{id}/user/detail','UserController@show')->name('detail');
        Route::get('{id}/user/edit','UserController@edit')->name('edit');
        Route::put('{id}/user/update','UserController@update')->name('update');
        Route::delete('{id}/user/delete','UserController@destroy')->name('delete');

    });

    Route::group([
        'prefix' => 'show',
        'as' => 'employee.',
        'namespace' => 'CrudUser',
    ],function (){
        Route::get('employee','EmployeeController@index')->name('index');
        Route::any('search/emp','EmployeeController@search')->name('search');
        Route::get('employee/create','EmployeeController@create')->name('create');
        Route::post('employee/store','EmployeeController@store')->name('store');
        Route::get('{id}/employee/detail','EmployeeController@show')->name('detail');
        Route::get('{id}/employee/edit','EmployeeController@edit')->name('edit');
        Route::put('{id}/employee/update','EmployeeController@update')->name('update');
        Route::delete('{id}/employee/delete','EmployeeController@destroy')->name('delete');
    });

    Route::group([
        'prefix' => 'product_category',
        'as' => 'product_category.',
        'namespace' => 'Merchant',
    ],function (){
        Route::get('/','ProductCategoryController@index')->name('index');
        Route::get('/create','ProductCategoryController@create')->name('create');
        Route::post('/store','ProductCategoryController@store')->name('store');
        Route::get('{id}/edit','ProductCategoryController@edit')->name('edit');
        Route::put('{id}/update','ProductCategoryController@update')->name('update');
        Route::delete('{id}/delete','ProductCategoryController@destroy')->name('delete');
    });

    Route::group([
        'prefix' => 'product',
        'as' => 'product.',
        'namespace' => 'Merchant',
    ],function(){
        Route::get('/','ProductController@index')->name('index');
        Route::any('/search','ProductController@search')->name('search');
        Route::get('/create','ProductController@create')->name('create');
        Route::post('/store','ProductController@store')->name('store');
        Route::get('{id}/show','ProductController@show')->name('show');
        Route::get('{id}/edit','ProductController@edit')->name('edit');
        Route::put('{id}/update','ProductController@update')->name('update');
        Route::delete('{id}/delete','ProductController@destroy')->name('delete');
    });




});
