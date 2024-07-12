<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Website\CartWebController;
use App\Http\Controllers\Website\CheckoutWebController;
use App\Http\Controllers\Website\HomeController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products/{product:slug}', [ProductWebController::class, 'show'])->name('products.show');
Route::resource('cart',CartWebController::class);
Route::post('cart/update',[CartWebController::class,'update'])->name('cart.update');
Route::get('Checkout',[CheckoutWebController::class,'index'])->name('Checkout');
Route::post('Checkout',[CheckoutWebController::class,'store']);
require __DIR__.'/auth.php';
