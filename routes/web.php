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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('users', 'UserController');

Route::resource('boxes', 'BoxController');

Route::resource('products', 'ProductController');

Route::resource('transports', 'TransportController');

Route::resource('movementTypes', 'MovementTypeController');

Route::resource('branches', 'BranchController');

Route::resource('transferMs', 'TransferMController');

Route::resource('transferDs', 'TransferDController');

Route::resource('inventories', 'InventoryController');