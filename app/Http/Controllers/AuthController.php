<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    public function registerInfo()
    {
//        $words = DB::table('words')->orderBy(DB::raw('random()'))->limit(12)->pluck('content');

        $users = User::all();
        while (true) {
            $words = DB::select("select string_agg(content,' ') as words from (select content from words order by random() LIMIT 12) as tmp;")[0]->words;
            $isValidWords = true;
            foreach ($users as $user) {
                if (Hash::check($words, $user->password, [])) {
                    $isValidWords = false;
                    break;
                }
            }
            if ($isValidWords) {
                return $words;
            }
        }

    }

    public function login(Request $request)
    {

        try {
            $request->validate([
                'password' => 'required'
            ]);

            $credentials = request(['password']);

            if (!Auth::attempt($credentials)) {
                return response()->json([
                    'status_code' => 500,
                    'message' => 'Unauthorized'
                ]);
            }

            $users = User::all();
            foreach ($users as $user) {
                if (Hash::check($request->password, $user->password, [])) {
                    $tokenResult = $user->createToken('authToken')->plainTextToken;
                    return response()->json([
                        'status_code' => 200,
                        'access_token' => $tokenResult,
                        'token_type' => 'Bearer',
                    ]);
                }
            }


            throw new \Exception('Error in Login');


        } catch (\Exception $error) {
            return response()->json([
                'status_code' => 500,
                'message' => 'Error in Login',
                'error' => $error,
            ]);
        }
    }
}
