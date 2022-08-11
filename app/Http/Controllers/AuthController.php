<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Response;

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
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $token = $request->user()->createToken('authToken')->plainTextToken;
            $request->user()->withAccessToken($token);
            return $token;

            // return redirect()->intended('/');

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
        // Auth::logout();
        // $request->session()->flush();

        return response()->json([
            'message' => 'Successfully logged out'
        ], 200);
    }

    public function sanctumToken(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $token = $request->user()->createToken('authToken')->plainTextToken;
            return Response::json(['token' => $token]);
        }
        return Response::json(['error' => 'Unauthorized'], 401);
    }
}
