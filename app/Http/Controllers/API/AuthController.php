<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'mobile' => 'required|max:15',
            'email' => 'email|required|unique:users',
            'password' => 'required'
        ]);

        $validatedData['password'] = bcrypt($request->password);
        $validatedData['api_token'] = Str::random(60);


        $user = User::create($validatedData);

        // $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user' => $user, 'api_token' => $validatedData['api_token'], 'status'=> true]);
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'mobile' => 'required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials', 'status'=> false]);
        }

        // $accessToken = auth()->user()->createToken('authToken')->accessToken;
        // $validatedData['api_token'] => ,

        return response(['user' => auth()->user(), 'api_token' => Str::random(60), 'status'=> true]);

    }
}
