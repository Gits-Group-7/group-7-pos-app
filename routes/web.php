<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Routes
Route::get('/login', [AuthController::class, "login"])->name('login.page');
Route::get('/register', [AuthController::class, "register"])->name('register.page');

Route::get('/', function () {
    return view('welcome');
});
