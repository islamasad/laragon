<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Activity;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mengambil data dari database
        $rooms = Room::get();

        return view('room.index')->with([
            'rooms' => $rooms,
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
            'price' => ['required', 'numeric'],
            'status' => ['boolean'],
        ]);
    
        // Simpan data pengguna ke dalam database
        $room = Room::create([
            'name' => $request->name,
            'price' => $request->price,
            'status' => $request->status ?? false,
        ]);

        $newestRoom = Room::latest()->first();

        // Simpan data baru ke database activity
        Activity::create([
            'room_id' => $newestRoom->id,
            'description' => 'Membuat Kamar baru ' . $newestRoom->name,
        ]);
               
        // Redirect ke halaman lain atau tampilkan pesan sukses
        return redirect()->route('room.index')->with('success', 'Kamar berhasil ditambahkan.');
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
        Room::where('id', $id) 
            ->update([
                'name' => $request->name,
                'price' => $request->price,
                'status' => $request->status,
            ]);

        return redirect()->route('room.index')->with('success', 'Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        {
            $room = Room::find($id);
        
            if (!$room) {
                return back()->with('error', 'Room not found.');
            }
        
            $roomName = $room->name; // Simpan nama kamar sebelum dihapus
        
            // Hapus kamar
            $room->delete();
        
            // Tambahkan aktivitas dengan deskripsi "roomname dihapus"
            Activity::create([
                'description' => "$roomName dihapus"
            ]);
        
            return redirect()->route('room.index')->with('success', 'Room has been deleted successfully.');
        }
    }
}
