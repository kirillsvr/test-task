<?php

use App\Http\Controllers\ProductsController;
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

Route::get('/', [ProductsController::class, 'index']);
Route::post('/', [ProductsController::class, 'store'])->name('store');
Route::group(['middleware' => 'role'], function() {
    Route::put('/products/{product}', [ProductsController::class, 'update']);
});
Route::delete('/products/{product}', [ProductsController::class, 'destroy']);
