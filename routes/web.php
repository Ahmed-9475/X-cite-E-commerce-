<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\ProductController;
use App\Http\Controllers\Website\ProductWebController;

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
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products/{product:slug}', [ProductWebController::class, 'show'])->name('products.show');
