<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/data-pengguna', function () {
    return view('admin.data-pengguna');
})->middleware(['auth', 'verified'])->name('admin.data-pengguna');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Show all users
    Route::get('/admin/data-pengguna', [UserController::class, 'index'])->name('admin.data-pengguna');

    // Edit a user
    Route::get('/admin/data-pengguna/{id}/edit', [UserController::class, 'edit'])->name('admin.data-pengguna.edit');

    // Update a user
    Route::patch('/admin/data-pengguna/{id}', [UserController::class, 'update'])->name('admin.data-pengguna.update');

    Route::delete('/admin/data-pengguna/{id}', [UserController::class, 'destroy'])->name('admin.data-pengguna.destroy');

    Route::get('/admin/tambah-data', [UserController::class, 'create'])->name('admin.tambah-data.create');
    Route::post('/admin/tambah-data', [UserController::class, 'store'])->name('admin.tambah-data.store');

});

require __DIR__.'/auth.php';
