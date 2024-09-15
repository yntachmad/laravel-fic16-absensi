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

    //update image profile & face embedding
    public function updateProfile(Request $request)
    {
        //
        $request->validate([
            'image' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'face_embedding' =>'required'
        ]);

        $user = $request->user();
        $image = $request->file('image');
        $face_embedding = $request->face_embedding;

        //save image
        $image->storeAs('public/images',$image->hashName());
        $user->image_url = $image->hashName();
        $user->face_embedding = $face_embedding;
        $user->save();



        //upload image
        // $imageName = time().'.'.$request->image->getClientOriginalExtension();
        // $request->image->move(public_path('images/users'), $imageName);

        // //store image path in user table
        // $request->user()->update([
        //     'image' => 'images/users/'.$imageName,
        //     'face_embedding' => json_encode($request->face_embedding),
        // ]);

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' =>$user],
            200
        );
    }
}
