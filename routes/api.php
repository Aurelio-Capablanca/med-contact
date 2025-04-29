<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/test',[TestController::class,'index']);
Route::post('/login', [AuthController::class, 'login']);
