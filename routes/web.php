<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParsingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/dashboard')->middleware('auth')->group(function() {
    Route::get('/', [HomeController::class, 'dashboard']);
    Route::resource('products', ProductController::class);
    Route::resource('users', UserController::class);
});

Route::get('/parsing/{startPage?}/{count?}', [ParsingController::class, 'parse']);
