<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Auth::login($user);
        return redirect()->route('gustos.create');
    }

    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('gustos.create');
        }

        return back()->withErrors(['email' => 'Credenciales inválidas']);
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('landing');
    }
}
