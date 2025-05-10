<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\TypeUser;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    // UI Retrievals
    public function index(): View|Application
    {
        $type_users = TypeUser::all();
        $users = DB::table('users', 'u')->select('u.user_id','nameUsers', 'passUser' ,'lastnameUsers', 'emailUser', 'tu.typeUser')
            ->join('typeUsers as tu', 'tu.idTypeUsers', '=', 'u.typeUser')->get();
        return view('users', compact('type_users', 'users'));
    }


    public function retrieveModal($id)
    {
        $user = DB::table('users', 'u')
            ->select('u.*', 'tu.typeUser')
            ->join('typeUsers as tu', 'tu.idTypeUsers', '=', 'u.typeUser')
            ->where('u.user_id', $id)
            ->first();
        $type_users = TypeUser::all();
        return view('modals/edit-user', compact('user', 'type_users'));
    }

    // Logical Operations

    public function createUsers(UsersRequest $request): RedirectResponse
    {
        User::create($request->validated());
        return redirect()->route('users')->with('success', 'User Created');
    }

    public function updateUsers(UsersRequest $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->update($request->validated());
        return redirect()->route('users.form')
            ->with('success', 'User update');
    }




}
