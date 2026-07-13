<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);


        $company = Company::create([
            'name' => $request->company_name,
            'slug' => str()->slug($request->company_name),
            'email' => $request->email
        ]);


        $user = User::create([
            'company_id' => $company->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'owner'
        ]);


        $token = $user->createToken('auth_token')->plainTextToken;


        return response()->json([
            'message' => 'Register berhasil',
            'user' => $user,
            'token' => $token
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if (!auth()->attempt($credentials)) {
            return response()->json([
                'message' => 'Email atau password salah'
            ],401);
        }

        $user = auth()->user();

        $token = $user->createToken('stockpilot-token')->plainTextToken;


        return response()->json([
            'message'=>'Login berhasil',
            'user'=>$user,
            'token'=>$token
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout berhasil'
        ]);
    }
}