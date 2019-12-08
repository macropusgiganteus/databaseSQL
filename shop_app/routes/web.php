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
Route::get('/login', function () {
    return view('login');
});

Route::resource('customers', 'CustomersController');
Route::get('/customers', 'CustomersController@index');
Route::get('/customers/create', 'CustomersController@create');

Route::get('/stock/index', 'StockInController@index');
Route::resource('stock', 'StockInController');

Route::resource('employees', 'EmployeesController');
Route::get('/employees', 'EmployeesController@index');
Route::get('/employees/create', 'EmployeesController@create');

Route::get('/payments', function () {
    return view('payments');
});

Route::resource('product', 'ProductsController');
Route::get('/products/create', 'ProductsController@create');
Route::get('/', 'ProductsController@index');
Route::post('/scale', 'ProductsController@scale');

Route::post('/checklist', 'ChecklistCustomerController@checklist');
Route::get('/checklist', function () {
    return view('checklist');
});

Route::get('/cart/index', 'CartController@index');
Route::resource('cart', 'CartController');
