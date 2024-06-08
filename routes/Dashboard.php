<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\StoreController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('Dashboard.Admin.index');
// });

Route::resource('Categories',CategoryController::class);
Route::resource('Products',ProductController::class);
Route::resource('Stores',StoreController::class);
