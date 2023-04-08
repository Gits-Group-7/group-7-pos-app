<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route Beranda Cuustomer
Route::get('/', [PageController::class, 'berandaPage'])->name('customer.beranda');

// route action logout (available customer & admin)
Route::get('/logout', [AuthController::class, "logout"])->name('logout.page');

// available route for customer only (guest)
Route::middleware(['guest'])->group(function () {
    // Route Auth
    Route::get('/login', [AuthController::class, "login"])->name('login.page');
    Route::get('/register', [AuthController::class, "register"])->name('register.page');

    // Route Action Auth
    Route::post('/register', [AuthController::class, "doRegister"])->name('do.register');
    Route::post('/login', [AuthController::class, "doLogin"])->name('do.login');
});

// available route for admin only
Route::middleware(['auth'])->group(function () {
    // Dashboard admin
    Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');

    // Route Template Page
    Route::get('/admin-button', [PageController::class, 'buttonPage'])->name('admin.button');
    Route::get('/admin-form', [PageController::class, 'formPage'])->name('admin.form');
    Route::get('/admin-chart', [PageController::class, 'chartPage'])->name('admin.chart');

    // Route Category
    Route::get('/index-kategori', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/tambah-kategori', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/edit-kategori/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('/hapus-kategori/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::post('/simpan-kategori', [CategoryController::class, 'store'])->name('category.store');
    Route::put('/ubah-kategori/{id}', [CategoryController::class, 'update'])->name('category.update');

    // Route Produk
    Route::get('/index-produk', [ProductController::class, 'index'])->name('product.index');
    Route::get('/tambah-produk', [ProductController::class, 'create'])->name('product.create');
});
