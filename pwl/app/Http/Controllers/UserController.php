<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil data user dari database
        $users = User::all();

        // Mengirim data user ke view dengan menggunakan with()
        return view('user/index')->with('users', $users);
    }

    public function show(Request $request)
    {
    $id = $request->route('id');

    // Mengambil data user dari database berdasarkan ID
    $user = User::find($id);

    // Pastikan user ditemukan dalam database
    if (!$user) {
        abort(404);
    }

    return view('user.show', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'isAdmin' =>['boolean'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'isAdmin' =>$request->isAdmin,
        ]);

        return redirect('user/index');
    }

    public function destroy($id)
{
    // Find the user by ID
    $user = User::find($id);

    // Check if the user exists
    if (!$user) {
        abort(404, 'User not found');
    }

    // Delete the user
    $user->delete();

    // Redirect back with a success message
    return redirect('user/index');
}

}
