<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



//auth
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
//register
Route::get('registration', 'Site\RegController@showRegisterForm');
Route::post('registerUser', 'Site\RegController@create')->name('registerUser');
//Роуты витрины сайта
Route::namespace('Site')->group(function(){
    Route::get('/', 'IndexController@index');
    Route::get('/Index', 'IndexController@index');
    Route::get('/Account', 'IndexController@account');
    Route::post('/Account/updatePass', 'IndexController@updatePass');
    Route::get('/Categories', 'CategoriesController@index');
    Route::get('/Category/{cat_id?}', ['uses' => 'ServicesController@servicesCategoryGet']);

    Route::get('/ServiceFind', ['uses' => 'ServicesController@servicesNameFind']);
    Route::get('/ServiceView/{s_id?}', ['uses' => 'ServicesController@serviceView']);

    Route::get('/Cart', 'CartsController@cartShow');
    Route::get('/CartAdd/{s_id?}', ['uses' => 'CartsController@cartInsert']);//добавление в корзину без указания количества
    Route::get('/CartDelete/{c_id?}', ['uses' => 'CartsController@cartDelete']);//удаление элемента из корзины
    Route::post('/CartAdd', 'CartsController@cartInsertWithCount');


    Route::get('/OrderNewWp/{c_id?}', ['uses' => 'OrdersController@orderAdd']);
    Route::get('/OrderNew', 'OrdersController@orderAddWithoutParams');
    Route::post('/OrderNew', 'OrdersController@orderAddWithoutParams');
    Route::post('/OrderInsert', 'OrdersController@orderInsert')->name('OrderInsert');
    Route::get('/Orders', 'OrdersController@ordersView');


    Route::get('/Contact', 'IndexController@contact');
    Route::get('/About', 'IndexController@about');
});
//Руты админочки

Route::namespace('Admin')->group(function(){
    Route::get('/Admin', 'OrdersController@index');
    Route::get('/Admin/services', 'ServicesController@index');
    Route::get('/Admin/serviceAdd', 'ServicesController@serviceAddShow');
    Route::get('/Admin/serviceDelete/{s_id?}',['uses'=>'ServicesController@serviceDelete']);
    Route::post('/Admin/serviceInsert', 'ServicesController@serviceAdd');

    Route::get('/Admin/unitAdd', 'UnitsController@unitAddShow');
    Route::post('/Admin/unitInsert', 'UnitsController@unitAdd');

    Route::get('/Admin/users', 'UsersController@index');
    Route::get('/Admin/users/Index', 'UsersController@usersShow');
    Route::get('/Admin/userDelete/{id?}', ['uses'=>'UsersController@userDelete']);
    Route::get('/Admin/userRoleUpd/{id?}', ['uses'=>'UsersController@userRoleUpdShow']);
    Route::post('/Admin/userRoleUpdate/', 'UsersController@userRoleUpdate');
   // Route::get('/Admin/users/userInsert', 'Site\RegController@showRegisterForm');

    Route::get('/Admin/categories', 'CaregoriesController@index');
    Route::get('/Admin/categoryAdd', 'CaregoriesController@categoryAddShow');
    Route::post('/Admin/categoryInsert', 'CaregoriesController@categoryAdd');
    Route::get('/Admin/categoryDelete/{cat_id?}',['uses'=>'CaregoriesController@categoryDelete']);

    Route::get('/Admin/orders', 'OrdersController@index');
    Route::post('/Admin/ordersUpd', 'OrdersController@update');


});
//Route::get('/Admin/users/userInsert', 'Site\RegController@showRegisterForm');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
