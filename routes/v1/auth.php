<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\Auth\LoginController;
use App\Http\Controllers\V1\Auth\RegisterController;
use App\Http\Controllers\V1\Auth\LogoutController;

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
