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

Route::get('/main', function () {
    return view('main');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/', 'ProductsController@index');
Route::post('/scale', 'ProductsController@scale');


Route::get('/customers', function () {
    return view('customers');
});

Route::get('/stock/index', 'StockInController@index');


Route::get('/employees', 'EmployeesController@index' );

Route::get('/employees/add', function () {
    return view('addEmployees');
});

Route::resource('stock','StockInController');


Route::get('/payments', function () {
    return view('payments');
});

Route::resource('product','ProductsController');
Route::get('/product/index', 'ProductsController@index');