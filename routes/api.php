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

//setting
Route::post('/save-email', [UserController::class, 'setting_save_email']);


