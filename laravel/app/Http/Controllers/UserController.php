<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mengambil data user dari database
        $users = User::all();

        return view('user.index')->with([
            'users' => $users,
            //'allocations' => $allocations,
            //'users' => User::all(['id', 'name']), // Ambil kolom id dan name dari tabel users
            //'items' => Item::all(['id', 'name', 'quantity']), // Ambil kolom id, name, dan quantity dari tabel items
            //'locations' => Location::all(['id', 'name']), // Ambil kolom id dan name dari tabel locations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan oleh formulir
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'unique:'.User::class, 'max:255'],
            'email' => ['required', 'string', 'email', 'unique:'.User::class, 'max:255'],
            'phone' => ['required', 'string', 'max:15'],
            'password' => ['required', 'string', 'min:6'],
        ]);
    
        // Simpan data pengguna ke dalam database
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password), // Anda sebaiknya hash password sebelum menyimpannya
        ]);
               
        // Redirect ke halaman lain atau tampilkan pesan sukses
        if (request()->url() === route('user.index')) {
            // Jika pengguna datang dari route 'user.index', maka arahkan kembali ke 'user.index'
            return redirect()->route('user.index')->with('success', 'Pengguna berhasil ditambahkan.');
        } elseif (request()->url() === route('register')) {
            // Jika pengguna datang dari route 'register', maka arahkan ke 'dashboard'
            return redirect()->route('dashboard')->with('success', 'Pengguna berhasil ditambahkan.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        User::where('id', $id) 
            ->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);

        return redirect()->route('user.index')->with('success', 'Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
