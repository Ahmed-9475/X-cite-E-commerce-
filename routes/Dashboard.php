<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\StoreController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;

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


Route::get('dashboard/admin',[DashboardController::class,'index'])->name('dashboardAdmin')->middleware('Admin');

Route::middleware('Admin')->prefix('dashboard/admin')->name('admin.')->group(function(){
    
        Route::resource('Categories',CategoryController::class);
        Route::resource('Products',ProductController::class);
        Route::resource('Stores',StoreController::class);


        
});
    require __DIR__.'/authDashboard.php';
    
