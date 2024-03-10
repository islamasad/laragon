<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;
use App\Models\Activity;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mengambil data tamu dengan status true dari database
        $guests = Guest::where('status', true)->latest()->get();
    
        return view('guest.index')->with([
            'guests' => $guests,
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
            'phone' => ['required', 'string', 'max:15'],
        ]);
    
        // Simpan data pengguna ke dalam database
        $guest = Guest::create([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

         // Mengambil data tamu terakhir yang baru saja dibuat
        $newestGuest = Guest::latest()->first();

        // Simpan data baru ke database activity
        Activity::create([
            'firstGuest_id' => $newestGuest->id,
            'description' => 'Membuat guest baru ' . $newestGuest->name,
        ]);
                       
        // Redirect ke halaman lain atau tampilkan pesan sukses
        return redirect()->route('guest.index')->with('success', 'Tamu berhasil ditambahkan.');
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
        $guest = Guest::find($id);
    
        // Menyimpan data lama tamu dalam bentuk array asosiatif
        $oldData = $guest->toArray();
        
        // Menyimpan perubahan yang terdeteksi
        $changedData = [];
    
        // Periksa apakah ada perubahan pada 'name' atau 'phone'
        if ($guest->name !== $request->name) {
            $guest->name = $request->name;
            $changedData['name'] = $request->name;
        }
    
        if ($guest->phone !== $request->phone) {
            $guest->phone = $request->phone;
            $changedData['phone'] = $request->phone;
        }

        Guest::where('id', $id) 
            ->update([
                'name' => $request->name,
                'phone' => $request->phone,
            ]);

        // Buat deskripsi aktivitas yang mencatat perubahan
        $description = 'Mengubah data ';
        foreach ($changedData as $field => $value) {
            $description .= "$field: $oldData[$field] menjadi $field: $value, ";
        }
        $description = rtrim($description, ', ');

        // Simpan aktivitas
        Activity::create([
            'firstGuest_id' => $guest->id,
            'description' => $description,
        ]);

        return redirect()->route('guest.index')->with('success', 'Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guest = Guest::find($id);
    
        if (!$guest) {
            return redirect()->route('guest.index')->with('error', 'Tamu tidak ditemukan.');
        }
    
        // Ubah status tamu menjadi false
        $guest->update(['status' => false]);

        // Tambahkan log ke database activity
        Activity::create([
            'guest_id' => $guest->id,
            'description' => 'Menonaktifkan tamu ' . $guest->name,
        ]);
    
        return redirect()->route('guest.index')->with('success', 'Status tamu berhasil diubah.');
    }
}
