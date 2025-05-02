<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/test', [TestController::class, 'index']);

    Route::get('/login', function () {
        return view('login');
    })->name('login.form');

    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard.form');
        Route::post('/create-user',
            [UsersController::class, 'createUsers'])->name('create-user');
    });
});
