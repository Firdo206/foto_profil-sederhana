<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Halaman publik
Route::get('/', [ProfileController::class, 'index'])->name('profile.index');

// Admin area (harus login)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('profile.dashboard');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__.'/auth.php';