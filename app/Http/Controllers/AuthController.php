<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required','unique:users,email'],
            'password' => ['required','min:6']
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()->json([
            'message' => 'User berhasil didaftarkan'
        ]);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $token = auth()->attempt($request->only('email','password'));

        if(!$token){
            return response()->json([
                'error' => 'Nomor atau kata sandi salah',
            ], 200);
        }

        $data['user'] = Auth::user();
        $data['token'] = $token;

        return response()->json([
            'message' => 'User berhasil Masuk',
            'data' => $data
        ], 200);
    }
    public function logout()
    {
        auth()->logout();

        return response()->json([
            'message' => 'User berhasil dikeluarkan'
        ]);
    }
}
