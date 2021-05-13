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

/**
 * 認証のサンプル
 */
Route::get('/me', function(Request $request){
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/api/homes{id}', 'Api\HomeController@show')->middleware('auth:sanctum');

Route::post('/items', 'Api\ItemController@store')->middleware('auth:sanctum');
Route::get('/items', 'Api\ItemController@index')->middleware('auth:sanctum');

Route::get('/items/{item_id}' ,'Api\ItemController@show')->middleware('auth:sanctum');

Route::put('/items/{item_id}', 'Api\ItemController@update')->middleware('auth:sanctum');
Route::get('/items/{item_id}/stocks', 'Api\StockController@index')->middleware('auth:sanctum');

Route::get('/items/{item_id}/stocks/{stock_id}','Api\StockController@show')->middleware('auth:sanctum');

