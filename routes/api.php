<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('users', 'UserAPIController');

Route::resource('boxes', 'BoxAPIController');

Route::resource('products', 'ProductAPIController');

Route::resource('transports', 'TransportAPIController');

Route::resource('movement_types', 'MovementTypeAPIController');

Route::resource('branches', 'BranchAPIController');

Route::resource('transfer_ms', 'TransferMAPIController');

Route::resource('transfer_ds', 'TransferDAPIController');

Route::resource('inventories', 'InventoryAPIController');