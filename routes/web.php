<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

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
    return view('home', ['title' => 'Home']);
})->name('home')->middleware("auth");;

Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::middleware('guest')->group(function () {
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
});
Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () {
    //master-item
    Route::get('master-item', [ItemController::class, 'index'])->name('index.item');
    Route::get('master-item/add', [ItemController::class, 'add'])->name('add.item');
    Route::get('master-item/view/{id}', [ItemController::class, 'getItemById'])->name('view.item');
    Route::post('/store-master-item', [ItemController::class, 'storeItem'])->name('store.item');
    //transaction
    Route::get('transaction', [TransactionController::class, 'index'])->name('index.transaction');
    Route::get('transaction/add', [TransactionController::class, 'add'])->name('add.transaction');
    //setting
    Route::get('setting', [UserController::class, 'setting_view'])->name('index.setting');
    //report
    Route::get('report', [ReportController::class, 'index'])->name('index.report');
});
