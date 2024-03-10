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
        $allocations = Allocation::with('author', 'item', 'location')->latest()->get();

        // Mengirim data allocation, user, item, dan location ke view
        return view('allocation/index')->with([
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

        // Get the item from the database based on the item_id
        $item = Item::findOrFail($request->item_id);

        // Calculate the new allocated quantity
        $allocated = $item->allocated + $request->quantity;

        if ($allocated > $item->quantity) {
            return back()->with('error', 'Allocated quantity cannot be greater than the available quantity.');
        }

        $allocation = Allocation::create([
            'item_id' => $request->item_id,
            'quantity' => $request->quantity,
            'location_id' => $request->location_id,
            'author_id' => Auth::guard('web')->user()->id,
        ]);

        $item->update([
            'allocated' => $allocated,
            'quantity' => $item->quantity - $request->quantity,
        ]);

        return redirect('allocation/index');
    }

    public function show(Request $request)
    {
        $id = $request->route('id');
        $allocation = Allocation::with(['item', 'location', 'author'])->find($id);

        return view('allocation.show')->with([
            'allocation' => $allocation,
            'locations' => Location::all(['id', 'name']),
        ]);
    }

    public function update(Request $request)
    {
        {
            // Validate the form data
            $request->validate([
                'item_id' => ['required'],
                'quantity' => ['required'],
                'location_id' => ['required'],
            ]);
        
            // Find the allocation to update
            $id = $request->route('id');
            $allocation = Allocation::find($id);
        
            // Calculate the difference between the new quantity and the current quantity in the database
            $difference = $allocation->quantity - $request->quantity;
        
            if ($difference != 0) {
                // Create a new allocation entry with the updated quantity
                Allocation::create([
                    'item_id' => $request->item_id,
                    'quantity' => $request->quantity,
                    'location_id' => $request->location_id,
                    'author_id' => Auth::guard('web')->user()->id,
                    
                ]);
        
                // Update the current allocation quantity
                $allocation->quantity = $request->quantity;
                $allocation->save();
            } else {
                // Create a new allocation entry with the same quantity
                Allocation::create([
                    'item_id' => $request->item_id,
                    'quantity' => $request->quantity,
                    'location_id' => $request->location_id,
                    'author_id' => Auth::guard('web')->user()->id,
                    
                ]);
        
                // Delete the current allocation entry
                $allocation->delete();
            }
        
            // Redirect back to the allocation list or show success message
            return redirect('allocation.index');
        }
    }
    
}
