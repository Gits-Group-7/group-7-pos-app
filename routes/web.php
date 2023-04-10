<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route Beranda Cuustomer
Route::get('/', [PageController::class, 'berandaPage'])->name('customer.beranda');
Route::get('/keranjang', [PageController::class, 'cartPage'])->name('customer.cart');

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
    Route::get('/admin/index-kategori', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/admin/tambah-kategori', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/admin/edit-kategori/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('/admin/hapus-kategori/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::post('/admin/simpan-kategori', [CategoryController::class, 'store'])->name('category.store');
    Route::put('/admin/ubah-kategori/{id}', [CategoryController::class, 'update'])->name('category.update');

    // Route Produk
    Route::get('/admin/index-produk', [ProductController::class, 'index'])->name('product.index');
    Route::get('/admin/tambah-produk', [ProductController::class, 'create'])->name('product.create');
    Route::get('/admin/edit-produk/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::get('/admin/hapus-produk/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::post('/admin/simpan-produk', [ProductController::class, 'store'])->name('product.store');
    Route::put('/admin/ubah-produk/{id}', [ProductController::class, 'update'])->name('product.update');
});
