<?php

use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;



Route::middleware('guest')->group(function () {

    // REGISTER
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    // LOGIN
    Route::get('/login', [AuthenticateController::class, 'show_login_form'])->name('login.show');
    Route::post('/login', [AuthenticateController::class, 'store'])->name('login.store');
});
