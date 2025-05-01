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
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
        Auth::login($user);
        $request->session()->regenerate();
        //dd(Auth::user());
        return redirect()->intended('/dashboard');
//        $credentials = [
//            'emailUser' => $request->email,
//            'password' => $request->password
//        ];
//        if (Auth::attempt($credentials)) {
//            $request->session()->regenerate();
//            dd(Auth::user());
//            return redirect()->intended('/dashboard');
//        }
//        return redirect()->back()->with('error', 'Invalid Credentials');
    }

}
