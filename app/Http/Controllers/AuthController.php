<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('login'); // Pastikan Anda memiliki file login.blade.php di folder resources/views
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('username', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            // Log::info('User logged in successfully.');
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        // Log::error('Login failed with credentials: ', $credentials);

        return back()->withErrors(['login' => 'Username atau Password salah!'])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/');
    }
}
