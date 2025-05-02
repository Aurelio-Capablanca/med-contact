<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\User;
use Users;

class UsersController extends Controller
{

    public function createUsers(UsersRequest $request): \Illuminate\Http\JsonResponse
    {
        User::create($request->validated());
        return response()->json(['status' => 'success', 'message' => 'User created'], 200);
    }


    public function updateUsers(UsersRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        $user = User::findOrFail($id);
        $user->update($request->validated());
        return response()->json(['status' => 'success', 'message' => 'User updated'], 200);
    }



}
