<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    // ████████████████  DASHBOARD  ████████████████
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('verified')->name('dashboard');
    // ████████████████  PROFILE  ████████████████
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// ████████████████  HOME  ████████████████
Route::inertia('/', 'Home')->name('home');
require __DIR__ . '/auth.php';
