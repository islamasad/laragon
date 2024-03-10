<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil data user dari database
        $users = User::all();

        // Mengirim data user ke view dengan menggunakan with()
        return view('user')->with('users', $users);
    }
}
