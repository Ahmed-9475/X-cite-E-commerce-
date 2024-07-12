<?php

use App\Http\Controllers\AuthDashboard\AuthenticatedSessionController;
use App\Http\Controllers\AuthDashboard\ConfirmablePasswordController;
use App\Http\Controllers\AuthDashboard\EmailVerificationNotificationController;
use App\Http\Controllers\AuthDashboard\EmailVerificationPromptController;
use App\Http\Controllers\AuthDashboard\NewPasswordController;
use App\Http\Controllers\AuthDashboard\PasswordController;
use App\Http\Controllers\AuthDashboard\PasswordResetLinkController;
use App\Http\Controllers\AuthDashboard\RegisteredUserController;
use App\Http\Controllers\AuthDashboard\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->group(function () {


    Route::get('admin/register', [RegisteredUserController::class, 'create'])->name('register');

    Route::post('admin/register', [RegisteredUserController::class, 'store']);

    Route::get('admin/login', [AuthenticatedSessionController::class, 'create'])->name('login');

    Route::post('admin/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Route::middleware('auth')->group(function () {
//     Route::get('verify-email', EmailVerificationPromptController::class)
//                 ->name('verification.notice');

//     Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
//                 ->middleware(['signed', 'throttle:6,1'])
//                 ->name('verification.verify');

//     Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
//                 ->middleware('throttle:6,1')
//                 ->name('verification.send');

//     Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
//                 ->name('password.confirm');

//     Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

//     Route::put('password', [PasswordController::class, 'update'])->name('password.update');

// });
