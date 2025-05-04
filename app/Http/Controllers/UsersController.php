<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\TypeUser;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    // UI Retrievals

    public function index(): View|Application
    {
        $type_users = TypeUser::all();
        $users = DB::table('users','u')->select('nameUsers', 'lastnameUsers', 'emailUser', 'tu.typeUser')
            ->join('typeUsers as tu', 'tu.idTypeUsers', '=', 'u.typeUser')->get();
        return view('users', compact('type_users', 'users'));
    }


    // Logical Operations

    public function createUsers(UsersRequest $request)
    {
        User::create($request->validated());
        return redirect()->route('users')->with('success', 'User created');
    }


    public function updateUsers(UsersRequest $request, $id):void
    {
        $user = User::findOrFail($id);
        $user->update($request->validated());
        response()->json(['status' => 'success', 'message' => 'User updated'], 200);
    }


}
