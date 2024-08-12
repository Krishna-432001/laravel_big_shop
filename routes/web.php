<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/page_terms', [HomeController::class, 'page_terms'])->name('home.page_terms');

Route::get('/about', [HomeController::class, 'about'])->name('home.about');

Route::get('/account', [HomeController::class, 'account'])->name('home.account');

Route::get('/privacy_policy', [HomeController::class, 'privacy_policy'])->name('home.privacy_policy');

Route::get('/purchase_guide', [HomeController::class, 'purchase_guide'])->name('home.purchase_guide');

Route::get('{any}', [HomeController::class, 'page_not_found'])->where('any', '.*');



use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'login'])->name('home.login');

Route::get('/register', [AuthController::class, 'register'])->name('home.register');

Route::get('/forget_password', [AuthController::class, 'forget_password'])->name('home.forget_password');

Route::get('/reset_password', [AuthController::class, 'reset_password'])->name('home.reset_password');

