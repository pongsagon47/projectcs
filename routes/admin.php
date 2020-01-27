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
        'prefix' => 'user-register',
        'as' => 'user-register.',
        'middleware' => ['admin.check'],
    ],function (){
        Route::get('/','UserRegisterController@index')->name('index');
        Route::any('search/user','UserRegisterController@search')->name('search');
        Route::get('{id}/detail','UserRegisterController@show')->name('detail');
        Route::put('{id}/confirm','UserRegisterController@confirm')->name('confirm');
        Route::delete('{id}/delete','UserRegisterController@destroy')->name('delete');
    });

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
        'middleware' => ['admin.check'],
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
        'middleware' => ['admin.check'],
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
        'prefix' => 'promotion',
        'as' => 'promotion.',
        'namespace' => 'Merchant',
        'middleware' => 'admin.check',
    ],function (){
        Route::get('/','PromotionController@index')->name('index');
        Route::get('/create','PromotionController@create')->name('create');
        Route::post('/store','PromotionController@store')->name('store');
        Route::get('{id}/edit','PromotionController@edit')->name('edit');
        Route::put('{id}/update','PromotionController@update')->name('update');
        Route::delete('{id}/delete','PromotionController@destroy')->name('delete');
    });

    Route::group([
        'prefix' => 'product',
        'as' => 'product.',
        'namespace' => 'Merchant',
        'middleware' => ['admin.check'],
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

    Route::group([
        'prefix' => 'about-us',
        'as' => 'about-us.',
        'middleware' => ['admin.check'],
    ],function () {
        Route::get('/','AboutUsController@create')->name('create');
        Route::post('save','AboutUsController@store')->name('store');
    });

    Route::group([
        'prefix' => 'intro',
        'as' => 'intro.',
        'middleware' => ['admin.check']
    ],function (){
       Route::get('/','IntroController@create')->name('create');
       Route::post('/save','IntroController@store')->name('store');
    });

    Route::group([
        'prefix' => 'news-category',
        'as' => 'news-category.',
        'middleware' => ['admin.check']
    ],function (){
        Route::get('/','NewsCategoryController@index')->name('index');
        Route::get('/create','NewsCategoryController@create')->name('create');
        Route::post('/store','NewsCategoryController@store')->name('store');
        Route::get('{id}/edit','NewsCategoryController@edit')->name('edit');
        Route::put('{id}/update','NewsCategoryController@update')->name('update');
        Route::delete('{id}/delete','NewsCategoryController@destroy')->name('delete');
    });

    Route::group([
        'prefix' => 'news',
        'as' => 'news.',
        'middleware' => ['admin.check']
    ],function (){
        Route::get('/','NewsController@index')->name('index');
        Route::get('/detail','NewsController@show')->name('detail');
        Route::get('/create','NewsController@create')->name('create');
        Route::post('/store','NewsController@store')->name('store');
        Route::get('{id}/edit','NewsController@edit')->name('edit');
        Route::put('{id}/update','NewsController@update')->name('update');
        Route::delete('{id}/delete','NewsController@destroy')->name('delete');
    });

    Route::group([
        'prefix' => 'orders-confirm',
        'as' => 'order-confirm.',
        'namespace' => 'Merchant',
        'middleware' => ['order']
    ],function (){
        Route::get('/','OrderConfirmController@index')->name('index');
        Route::get('{id}/confirm','OrderConfirmController@confirm')->name('confirm');
        Route::delete('{id}/delete/order','OrderConfirmController@destroyOrder')->name('destroy');
        Route::put('edit','OrderConfirmController@editOrderDetail')->name('edit');
        Route::delete('{id}/delete','OrderConfirmController@destroy')->name('delete');
        Route::put('{id}/success/order','OrderConfirmController@orderSuccess')->name('success');
    });

    Route::group([
        'prefix' => 'order-today',
        'as' => 'order-today.',
        'namespace' => 'Merchant',
        'middleware' => ['order']
    ],function (){
        Route::get('/','OrderTodayController@index')->name('index');
        Route::get('{id}/show','OrderTodayController@show')->name('show');
        Route::get('/production/status','OrderTodayController@productionStatus')->name('production');
    });

    Route::group([
        'prefix' => 'thai-dessert',
        'as' => 'thai-dessert.',
        'namespace' => 'Merchant',
        'middleware' => ['thai.dessert']
    ],function (){
        Route::get('/','ThaiDessertController@index')->name('index');
        Route::get('{id}/show','ThaiDessertController@show')->name('show');
        Route::put('{id}/confirm','ThaiDessertController@confirm')->name('confirm');
        Route::get('maker','ThaiDessertController@dessertMaker')->name('maker');
        Route::put('{id}/order/success','ThaiDessertController@orderSuccess')->name('success');
    });

    Route::group([
        'prefix' => 'role-dessert',
        'as' => 'role-dessert.',
        'namespace' => 'Merchant',
        'middleware' => ['role.dessert']
    ],function (){
        Route::get('/','RoleDessertController@index')->name('index');
        Route::get('{id}/show','RoleDessertController@show')->name('show');
        Route::put('{id}/confirm','RoleDessertController@confirm')->name('confirm');
        Route::get('maker','RoleDessertController@dessertMaker')->name('maker');
        Route::put('{id}/order/success','RoleDessertController@orderSuccess')->name('success');
    });

    Route::group([
        'prefix' => 'brownie-dessert',
        'as' => 'brownie-dessert.',
        'namespace' => 'Merchant',
        'middleware' => ['brownie.dessert']
    ],function (){
        Route::get('/','BrownieDessertController@index')->name('index');
        Route::get('{id}/show','BrownieDessertController@show')->name('show');
        Route::put('{id}/confirm','BrownieDessertController@confirm')->name('confirm');
        Route::get('/maker','BrownieDessertController@dessertMaker')->name('maker');
        Route::put('{id}/order/success','BrownieDessertController@orderSuccess')->name('success');
    });

    Route::group([
        'prefix' => 'cake-dessert',
        'as' => 'cake-dessert.',
        'namespace' => 'Merchant',
        'middleware' => ['cake.dessert']
    ],function (){
        Route::get('/','CakeDessertController@index')->name('index');
        Route::get('{id}/show','CakeDessertController@show')->name('show');
        Route::put('{id}/confirm','CakeDessertController@confirm')->name('confirm');
        Route::get('maker','CakeDessertController@dessertMaker')->name('maker');
        Route::put('{id}/order/success','CakeDessertController@orderSuccess')->name('success');
    });

    Route::group([
        'prefix' => 'cookie-dessert',
        'as' => 'cookie-dessert.',
        'namespace' => 'Merchant',
        'middleware' => ['cookie.dessert']
    ],function (){
        Route::get('/','CookieDessertController@index')->name('index');
        Route::get('{id}/show','CookieDessertController@show')->name('show');
        Route::put('{id}/confirm','CookieDessertController@confirm')->name('confirm');
        Route::get('maker','CookieDessertController@dessertMaker')->name('maker');
        Route::put('{id}/order/success','CookieDessertController@orderSuccess')->name('success');
    });

    Route::group([
        'prefix' => 'delivery',
        'as' => 'delivery.',
        'namespace' => 'Merchant',
        'middleware' => ['delivery']
    ],function (){
        Route::get('/','DeliveryController@index')->name('index');
        Route::get('{id}/bill','DeliveryController@bill')->name('bill');
        Route::get('{id}/about/user','DeliveryController@aboutUser')->name('user');
        Route::put('{id}/success','DeliveryController@success')->name('success');
    });

    Route::group([
        'prefix' => 'report-revenue',
        'as' => 'report-revenue.',
        'namespace' => 'Report',
        'middleware' => ['admin.check'],
    ],function (){
        Route::get('/','ReportSalesRevenueController@index')->name('index');
        Route::get('{id}/detail','ReportSalesRevenueController@show')->name('detail');
        Route::any('search/report-revenue','ReportSalesRevenueController@search')->name('search');

    });

    Route::group([
        'prefix' => 'branch-store',
        'as' => 'branch-store.',
        'namespace' => 'Report',
        'middleware' => ['admin.check'],
    ],function (){
        Route::get('/','ReportBrachStoreController@index')->name('index');

    });

    Route::group([
        'prefix' => 'production-list',
        'as' => 'production-list.',
        'namespace' => 'Report',
        'middleware' => ['admin.check'],
    ],function (){
        Route::get('/','ReportProductionListController@index')->name('index');
        Route::get('{date}/detail','ReportProductionListController@show')->name('detail');
        Route::any('search/production-list','ReportProductionListController@search')->name('search');

    });

    Route::group([
        'prefix' => 'dessert-sales',
        'as' => 'dessert-sales.',
        'namespace' => 'Report',
        'middleware' => ['admin.check'],
    ],function (){
        Route::get('/','ReportDessertSalesController@index')->name('index');

    });
});


