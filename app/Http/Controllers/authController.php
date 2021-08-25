<?php

namespace App\Http\Controllers;

use App\Events\EventExample;
use App\Models\User;
use Cookie;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class authController extends Controller
{
    public function register(Request $request)
    {
        $user = new User();
        $user->username =$request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->ime= $request->input('ime');
        $user->prezime = $request->input('prezime');
        $user->role = 2;
        $user->save();
        return $user;

    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:2'],
        ]);

        try{

            $user =User::where('username', $request->username)->first();
            if (! $user || ! Hash::check($request->password, $user->password)) {
                throw ValidationException::withMessages([
                    'username' => ['The provided credentials are incorrect.'],
                ]);
            }
            //send token to the register user
            $token = $user->createToken('Laravel-Sanctum')->plainTextToken;

            return response()->json([
                'status_code' => 200,
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user,
            ]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function user()
    {
        return Auth::user();
    }

    public  function logout()
    {
        $cookie = Cookie::forget('jwt');
        return response([
            "message"=> "Succeess"
        ])->withCookie($cookie);
    }
}
