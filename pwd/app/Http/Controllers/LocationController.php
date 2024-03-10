<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        // Mengambil data location dari database
        $locations = Location::latest();
        
        if (request('search')) {
            $searchTerm = '%' . request('search') . '%';
            $locations->where('name', 'LIKE', $searchTerm);
        }
        $locations = $locations->get();
        // Mengirim data user ke view dengan menggunakan with()
        return view('location/index')->with('locations', $locations);
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            
        ]);

        $location = Location::create([
            'name' => $request->name,
            'author_id' => Auth::guard('web')->user()->id,
        ]);

        return redirect('location/index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id = $request->route('id'); // Mengambil nilai ID dari URL
        $location = Location::with('author')->find($id);
        $location = Location::with(['items'])->find($id);
        
        // Pastikan location ditemukan dalam database
        if (!$location) {
            abort(404);
        }

        
        $authorName = $location->author->name;

        return view('location.show', compact('location','authorName'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
