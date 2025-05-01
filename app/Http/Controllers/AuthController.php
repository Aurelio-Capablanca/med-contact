<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $user = User::where('emailUser', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->passUser)) {
            return response()->json(['message'=>'Invalid Credentials'],401);
        }
        Auth::login($user);

        return redirect()->intended('/dashboard');
    }

}
