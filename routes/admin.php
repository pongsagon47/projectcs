<?php

Route::get('/employee', function () {
    return redirect()->route('login.employee');
});

Route::get('register/employee', 'Employee\RegisterController@showRegistrationForm')->name('register.employee');
Route::post('register/employee', 'Employee\RegisterController@register');

Route::get('login/employee', 'Employee\LoginController@showLoginForm')->name('login.employee');
Route::post('login/employee', 'Employee\LoginController@login');
Route::post('logout/employee', 'Employee\LoginController@logout')->name('logout.employee');

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
        Route::get('edit','EmpController@edit')->name('edit');
        Route::put('update','EmpController@update')->name('update');
    });

    Route::group([
        'prefix' => 'show',
        'as' => 'user.',
        'namespace' => 'CrudUser',
    ],function (){
        Route::get('user','UserController@index')->name('index');

    });

    Route::group([
        'prefix' => 'show',
        'as' => 'employee.',
        'namespace' => 'CrudUser',
    ],function (){
        Route::get('employee','EmployeeController@index')->name('index');
    });


});