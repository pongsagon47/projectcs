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
    'prefix' => 'emp',
    'as' => 'emp.',
    'namespace' => 'BackendEmp'
],function (){
    Route::get('{id}/edit','EmpController@edit')->name('edit');
    Route::put('{id}/update','EmpController@update')->name('update');
});