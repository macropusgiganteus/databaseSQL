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
Route::get('/logout', 'UsersController@logout');
Route::get('/users/register', function () {
    return view('login.register');
});
Route::post('/users/create', 'UsersController@create');
Route::post('/users/login', 'UsersController@login');
Route::resource('users', 'UsersController');
Route::get('/login', 'UsersController@index');

Route::resource('customers', 'CustomersController');
Route::get('/customers', 'CustomersController@index');
Route::get('/customers/create', 'CustomersController@create');

Route::get('/stock/index', 'StockInController@index');
Route::resource('stock', 'StockInController');

Route::resource('employees', 'EmployeesController');
Route::get('/employees/promote', 'EmployeesController@promote');
Route::get('/employees/add', function () {
    return view('employee.addemployees');
});

Route::get('/payments/index', 'PaymentsController@index');

Route::resource('payments', 'PaymentsController');

Route::resource('product', 'ProductsController');
Route::get('/products/create', 'ProductsController@create');
Route::get('/', 'ProductsController@index');
Route::get('products/search', 'ProductsController@search');

Route::post('/scale', 'ProductsController@scale');

//-----------------------------------------------------------
Route::post('/checklistID', 'ChecklistCustomerController@checklist');
Route::get('/checklist', function () {
    return view('checklist');
});

Route::get('/cart/index', 'CartController@index');
Route::resource('cart', 'CartController');
//Route::post('/cart/clear','CartController@clear');

Route::get('/addRday','Controller@addrequiredDay');
Route::post('/addOrder/success','Controller@addOrder');
//-----------------------------------------------------------
Route::get('/cart/index', 'CartController@index');
Route::resource('cart', 'CartController');

Route::resource('buy1get1', 'Buy1get1controller');
Route::get('/buy1get1', 'Buy1get1controller@index');
Route::resource('discount', 'DiscountController');

