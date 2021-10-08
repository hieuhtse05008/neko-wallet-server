<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function test()
    {
        return 'OK';
    }

    public function register()
    {
        return 'OK';
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
//dd($credentials);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $token = $request->user()->createToken('authToken')->plainTextToken;
            $request->user()->withAccessToken($token);
//            dd($token);

            return redirect()->intended('/');

        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    public function logout(Request $request)
    {
        if ($request->user()) {
            // Revoke all tokens...
            $request->user()->tokens()->delete();
        }
        Auth::logout();
        $request->session()->flush();

        return redirect('/');

    }



}
