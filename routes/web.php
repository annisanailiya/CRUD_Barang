<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/data-pengguna', [UserController::class, 'dashboard'])->name('admin.data-pengguna');
    Route::get('/inventor/dashboard-inventor', [UserController::class, 'dashboard'])->name('inventor.dashboard-inventor');
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/data-pengguna', [UserController::class, 'index'])->name('admin.data-pengguna');
    Route::get('/admin/data-pengguna/{id}/edit', [UserController::class, 'edit'])->name('admin.data-pengguna.edit');
    Route::patch('/admin/data-pengguna/{id}', [UserController::class, 'update'])->name('admin.data-pengguna.update');
    Route::delete('/admin/data-pengguna/{id}', [UserController::class, 'destroy'])->name('admin.data-pengguna.destroy');
    Route::get('/admin/tambah-data', [UserController::class, 'create'])->name('admin.tambah-data.create');
    Route::post('/admin/tambah-data', [UserController::class, 'store'])->name('admin.tambah-data.store');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/inventor/dashboard-inventor', [BarangController::class, 'index'])->name('inventor.dashboard-inventor');
    Route::get('/inventor/dashboard-inventor/{id}/editBarang', [BarangController::class, 'editBarang'])->name('inventor.dashboard-inventor.editBarang');
    Route::patch('/inventor/dashboard-inventor/{id}', [BarangController::class, 'updateBarang'])->name('inventor.dashboard-inventor.updateBarang');
    Route::delete('/inventor/dashboard-inventor/{id}', [BarangController::class, 'destroyBarang'])->name('inventor.dashboard-inventor.destroyBarang');
    Route::get('/inventor/tambah-barang', [BarangController::class, 'createBarang'])->name('inventor.tambah-barang.createBarang');
    Route::post('/inventor/tambah-barang', [BarangController::class, 'storeBarang'])->name('inventor.tambah-barang.storeBarang');
    Route::get('/barang/detail/{id}', [BarangController::class, 'detailBarang'])->name('inventor.dashboard-inventor.detailBarang');

});

require __DIR__.'/auth.php';
