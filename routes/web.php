<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
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
//        USERS
        Route::get('/users',
            [UsersController::class, 'index'])
            ->name('users.form');
        Route::get('/edit-users/{id}',
            [UsersController::class, 'retrieveModal'])
            ->name('edit-user.modal');
        Route::post('/create-user',
            [UsersController::class, 'createUsers'])
            ->name('create-user');
        Route::post('/update-user/{id}',
            [UsersController::class, 'updateUsers'])
            ->name('update-user');
        Route::delete('/delete-user/{id}',
            [UsersController::class, 'deleteUser'])
            ->name('delete-user');
//        USERS
//        DOCTORS
          Route::get('/doctors',
          [DoctorController::class, 'index'])
          ->name('doctors.form');
          Route::post('/create-doctor',
          [DoctorController::class, 'createDoctors'])
          ->name('create-doctor');

//        DOCTORS
    });
});
