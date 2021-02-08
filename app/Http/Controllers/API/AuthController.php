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
        $otp = random_int(1, 200) . random_int(1, 200);
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'mobile' => 'required|max:10|unique:users',
            'email' => 'email|unique:users',
            'password' => 'required'
        ]);

        $validatedData['password'] = bcrypt($request->password);
        $validatedData['api_token'] = Str::random(60);
        $validatedData['otp'] = $otp;
        $validatedData['status'] = 2;
        $user = User::create($validatedData);

        return response(['user' => $user, 'api_token' => $validatedData['api_token'], 'status' => true]);
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'mobile' => 'required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials', 'status' => false]);
        }

        $token = Str::random(60);
        auth()->user()->update(['api_token' => $token]);
        return response(['user' => auth()->user(), 'api_token' => $token, 'status' => true]);
    }
}
