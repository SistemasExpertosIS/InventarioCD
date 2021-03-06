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

Route::get('/unauthorized', function () {
    return view('errors.403');
});
Route::get('/reporte-usuario','Reportes\ReportesController@Usuarios');
Route::get('/reporte-inventario','Reportes\ReportesController@totalInventario');
Route::get('/reporte-traslado','Reportes\ReportesController@traslados');
Route::get('/reporte-producto','Reportes\ReportesController@Productos');
Route::get('/reporte-caja','Reportes\ReportesController@cajas');
Route::get('/reporte-sucursales','Reportes\ReportesController@sucursales');
Route::get('/reporte-transportes','Reportes\ReportesController@transportes');
Route::get('/transferDs/{transferD}/crear','TransferDController@crear')->name('transferDs.crear');
Route::get('/transferMs/{transferM}/movimiento','TransferMController@movimiento')->name('transferMs.movimiento');
Route::get('/transferMs/{transferM}/rechazarMovimiento','TransferMController@rechazarMovimiento')->name('transferMs.rechazarMovimiento');
Route::get('/reportes', function() {
    return view('reportes.index');
});