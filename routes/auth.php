<?php

use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;



Route::middleware('guest')->group(function () {


    // ████████████████  REGISTER  ████████████████
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    // ████████████████  LOGIN  ████████████████
    Route::get('/login', [AuthenticateController::class, 'show_login_form'])->name('login.show');
    Route::post('/login', [AuthenticateController::class, 'store'])->name('login');

    // ████████████████  RESET PASSWORD  ████████████████
    Route::get('/forgot-password', [ResetPasswordController::class, 'password_request'])->name('password.request');
    Route::post('/forgot-password', [ResetPasswordController::class, 'send_email'])->name('password.email');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'reset_form'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset_handler'])->name('password.update');
});


Route::middleware('auth')->group(function () {

    // ████████████████  LOGOUT  ████████████████
    Route::post('/logout', [AuthenticateController::class, 'destroy'])->name('logout');

    // ████████████████  EMAIL VERIFICATION  ████████████████
    Route::get('/email/verify', [EmailVerificationController::class, 'notice'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'handler'])->middleware(['signed'])->name('verification.verify');
    Route::post('/email/verification-notification', [EmailVerificationController::class, 'resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');
});
