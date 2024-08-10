<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'login'])->name('home.login');

Route::get('/register', [AuthController::class, 'register'])->name('home.register');

Route::get('/forget_password', [AuthController::class, 'forget_password'])->name('home.forget_password');