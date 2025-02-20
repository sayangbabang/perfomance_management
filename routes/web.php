<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ManagementController;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\SessionGuard;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/report', [ManagementController::class, 'index'])->middleware(['auth', 'verified'])->name('management.view');
Route::get('/management', [ManagementController::class, 'create'])->middleware(['auth', 'verified'])->name('management.create');
Route::post('/management', [ManagementController::class, 'store'])->name('management.store');


require __DIR__.'/auth.php';
