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

Route::get('/', function () {
    return view('login');
});
// Route::get('/products', function () {
//     return view('products');
// });
Route::get('/customers', function () {
    return view('customers');
});
Route::get('/employees', 'EmployeesController@index' );
Route::get('/employees/add', function () {
    return view('addEmployees');
});
Route::get('/show', function(){
    return App\Employees::all();
});

//check CusID
Route::get('/check_customerID',function(){
    return view('check_customerID');
});

Route::post('/login_customer', 'CheckidController@checkID');

//Show order
Route::get('/order','Controller@getData');

Route::get('/products','Controller@getProducts');
// Route::post('/login_customer', 'CheckidController@getScale');