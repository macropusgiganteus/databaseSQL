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

Route::get('/customers', 'CustomersController@index');

Route::get('/stock/index', 'StockInController@index');
Route::resource('stock', 'StockInController');

Route::get('/employees', 'EmployeesController@index');
Route::get('/employees/add', function () {
    return view('employees.addEmployees');
});

Route::get('/payments', function () {
    return view('payments');
});

Route::resource('product', 'ProductsController');
Route::get('/products/create', 'ProductsController@create');
Route::get('/', 'ProductsController@index');
Route::post('/scale', 'ProductsController@scale');
