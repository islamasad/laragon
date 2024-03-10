<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        $userCount = User::count();

        if ($userCount === 0) {
            // Tidak ada pengguna, tampilkan tombol register
            return view('auth.login')->with(
                'showRegisterButton', true
            );
        } else {
            // Ada pengguna, jangan tampilkan tombol register
            return view('auth.login')->with(
                'showRegisterButton', false
            );
        }
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
            return redirect()->route('dashboard'); // Ganti dengan rute yang sesuai
        }

        return back()->withErrors(['username' => 'Username atau password salah']);
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register()
    {
        return view('auth.register');
    }
}
