<?php

namespace App\Http\Controllers;

use App\Models\Allocation;
use App\Models\User;
use App\Models\Location;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AllocationController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil data allocation dari database dengan relasi ke User, Item, dan Location
        $allocations = Allocation::with('user', 'item', 'location')->get();

        // Mengirim data allocation, user, item, dan location ke view
        return view('allocation')->with([
            'allocations' => $allocations,
            'users' => User::all(['id', 'name']), // Ambil kolom id dan name dari tabel users
            'items' => Item::all(['id', 'name', 'quantity']), // Ambil kolom id, name, dan quantity dari tabel items
            'locations' => Location::all(['id', 'name']), // Ambil kolom id dan name dari tabel locations
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => ['required'],
            'quantity' => ['required'],
            'location_id' => ['required'],
            
        ]);

        $allocation = Allocation::create([
            'item_id' => $request->item_id,
            'quantity' => $request->quantity,
            'location_id' => $request->location_id,
            'author_id' => Auth::guard('web')->user()->id,
        ]);

        // Kurangi nilai quantity pada Item
        $item = Item::find($request->item_id);
        $item->quantity -= $request->quantity;
        $item->save();

        return redirect('allocation');
    }
}
