<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //login
    public function login(Request $request)
    {

        $loginData = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);

        $user = User::where('email', $loginData['email'])->first();

        //Check User Exists
        if (!$user) {
            return response()->json(['message' => 'User not found'], 401);
        }

        //Check Password
        if (!Hash::check($loginData['password'], $user->password)) {
            return response()->json(['message' => 'Invalid password'], 401);
        }

        //generate token
        $token = $user->createToken('auth_Token')->plainTextToken;

        return response()->json([
            'token' => $token,
            // 'token_type' => 'Bearer',
            'user' => $user,
        ], 200);

    }

    //logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully'], 200);
    }
}
