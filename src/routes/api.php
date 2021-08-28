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

Route::get('/homes', 'Api\HomeController@show')->middleware('auth:sanctum');

Route::get('/boxes', 'Api\BoxController@index')->middleware('auth:sanctum');

Route::get('/boxes/{box_id}', 'Api\BoxController@show')->middleware('auth:sanctum');

Route::post('/items', 'Api\ItemController@store')->middleware('auth:sanctum');
Route::get('/items', 'Api\ItemController@index')->middleware('auth:sanctum');

Route::get('/items/{item_id}' ,'Api\ItemController@show')->middleware('auth:sanctum');

Route::put('/items/{item_id}', 'Api\ItemController@update')->middleware('auth:sanctum');
Route::get('/stocks', 'Api\StockController@index')->middleware('auth:sanctum');
Route::post('/stocks', 'Api\StockController@create')->middleware('auth:sanctum');

Route::get('/stocks/{stock_id}','Api\StockController@show')->middleware('auth:sanctum');
Route::put('/stocks/{stock_id}', 'Api\StockController@update')->middleware('auth:sanctum');


Route::get('/categories', 'Api\CategoryController@index')->middleware('auth:sanctum');
Route::post('/categories', 'Api\CategoryController@create')->middleware('auth:sanctum');
Route::put('/categories/{category_id}', 'Api\CategoryController@update')->middleware('auth:sanctum');
Route::delete('/categories/{category_id}', 'Api\CategoryController@delete')->middleware('auth:sanctum');

Route::post('/boxes', 'Api\BoxController@create')->middleware('auth:sanctum');
Route::put('/boxes/{box_id}', 'Api\BoxController@update')->middleware('auth:sanctum');

Route::post('/login', 'Api\UserController@login');
Route::post('/logout', 'Api\UserController@logout')->middleware('auth:sanctum');
Route::post('/register', 'Api\UserController@store');

Route::post('/invitations', 'Api\InvitationController@store')->middleware('auth:sanctum');
Route::post('/invitations/{token}/register', 'Api\InvitationController@join');
Route::get('/invitations', 'Api\InvitationController@index')->middleware('auth:sanctum');

Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'shopping-lists'], function() {
    Route::get('/', 'Api\ShoppingListController@index');
    Route::get('/{shopping_list_id}', 'Api\ShoppingListController@show');
    Route::put('/{shopping_list_id}', 'Api\ShoppingListController@update');
    Route::post('/', 'Api\ShoppingListController@create');
    Route::delete('/{shopping_list_id}', 'Api\ShoppingListController@delete');

    Route::post('/{shopping_list_id}/tasks', 'Api\ShoppingTaskController@create');
    Route::put('/{shopping_list_id}/tasks/{task_id}', 'Api\ShoppingTaskController@update');
    Route::delete('/{shopping_list_id}/tasks/{task_id}', 'Api\ShoppingTaskController@delete');
    Route::post('/{shopping_list_id}/tasks/{task_id}/complete', 'Api\ShoppingTaskController@complete');
    Route::post('/{shopping_list_id}/tasks/{task_id}/incomplete', 'Api\ShoppingTaskController@incomplete');

});


Route::get('/update-frequency', 'Api\StockController@frequency')->middleware('auth:sanctum');