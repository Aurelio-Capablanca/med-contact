<?php

use Illuminate\Support\Facades\Route;
use \App\Models\User;

//Route::prefix('v1')
//    ->middleware('api')
//    ->group(function () {
//        Route::post('/users', function () {
//            $user = User::create([
//                'nameUsers' => 'Someone',
//                'lastnameUsers' => 'Somewhere',
//                'emailUser' => 'eamil@someone.com',
//                'passUser' => bcrypt('secret123'),
//                'typeUser' => 1
//            ]);
//
//            return response()->json($user, 201);
//        })->name('api.users.create');
//    });
