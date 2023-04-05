<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Routes
Route::get('/login', [AuthController::class, "login"])->name('login.page');
Route::get('/register', [AuthController::class, "register"])->name('register.page');

// Routes Admin
Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');

// Route Template Page Admin
Route::get('/admin-button', [PageController::class, 'buttonPage'])->name('admin.button');
Route::get('/admin-form', [PageController::class, 'formPage'])->name('admin.form');
Route::get('/admin-chart', [PageController::class, 'chartPage'])->name('admin.chart');

// Routes Default
Route::get('/', function () {
    return view('welcome');
});
