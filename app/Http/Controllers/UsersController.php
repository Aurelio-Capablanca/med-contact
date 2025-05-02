<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\TypeUser;
use App\Models\User;

class UsersController extends Controller
{

    // UI Retrievals

    public function index()
    {
        $type_users = TypeUser::all();
        return view('users', compact('type_users'));
    }


    // Logical Operations

    public function createUsers(UsersRequest $request)
    {
        User::create($request->validated());
        response()->json(['status' => 'success', 'message' => 'User created'], 200);
    }


    public function updateUsers(UsersRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->validated());
        response()->json(['status' => 'success', 'message' => 'User updated'], 200);
    }


}
