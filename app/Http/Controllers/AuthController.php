<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Proses Register
    public function register(Request $request)
    {
        \Log::info('Masuk ke method register');
        \Log::info($request->all());

        $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
        ]);

        \Log::info('User berhasil dibuat: ', $user->toArray());

        // Redirect ke login TANPA login otomatis
        return redirect('/login')->with('success', 'Register berhasil! Silakan login.');
    }



    // Proses Login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
    $request->session()->regenerate();

    if (auth()->user()->role === 'admin') {
        return redirect('/dashboard'); // Halaman admin
    } else {
        return redirect('/home'); // Halaman user biasa
    }
}

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    protected function redirectTo()
    {
        if (auth()->user()->role === 'admin') {
            return '/dashboard'; // halaman dashboard admin
        }
        return '/home'; // halaman user biasa
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/index');
    }

    //check login register
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect('/home');
        }
        return view('login');
    }

    public function showRegisterForm()
    {
        if (Auth::check()) {
            return redirect('/home');
        }
        return view('register');
    }


}
