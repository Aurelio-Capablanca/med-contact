<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request): RedirectResponse
    {
        $user = User::where('emailUser', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->passUser)) {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

}
