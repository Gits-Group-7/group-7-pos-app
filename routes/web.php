<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Routes
Route::get('/login', [AuthController::class, "login"])->name('login.page');
Route::get('/register', [AuthController::class, "register"])->name('register.page');

// Routes Admin
Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');

// Routes Default
Route::get('/', function () {
    return view('welcome');
});
