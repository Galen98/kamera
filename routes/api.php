<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//category
Route::get('/categories', [ItemController::class, 'getCategory']);
Route::get('/get-code/{prefix}', [ItemController::class, 'get_code']);
Route::post('/categories', [ItemController::class, 'storeCategory']);

//item 
Route::get('/all-master-items', [ItemController::class, 'getMasterItem']);
Route::get('/all-master-items/categories={id_cat}', [ItemController::class, 'getItemByCategory']);
Route::post('/item-status-change/{id}', [ItemController::class, 'update_status_item']);
Route::get('/count-stock/{id}', [ItemController::class, 'get_last_available']);
Route::post('/update-item/{id}', [ItemController::class, 'updateItem']);
Route::get('/item-transaction', [ItemController::class, 'get_item_transaction']);

//setting
Route::post('/save-email', [UserController::class, 'setting_save_email']);
Route::get('/get-invoices', [UserController::class, 'get_all_invoices']);
Route::get('/invoices/{id}', [UserController::class, 'get_byid_invoices']);
Route::post('/invoices-update/{id}', [UserController::class, 'update_invoices']);
Route::post('/save-invoices', [UserController::class, 'post_invoices']);
Route::delete('/destroy-invoices/{id}', [UserController::class, 'destroy_invoices']);
