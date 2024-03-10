<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Location;
use App\Models\Allocation;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
    // Ambil 5 data terakhir dari masing-masing tabel
    $last5Items = Item::with('author')->latest()->take(5)->get();
    $last5Locations = Location::with('author')->latest()->take(5)->get();
    $last5Allocations = Allocation::with('author')->latest()->take(5)->get();

    // Gabungkan dan urutkan data menjadi satu koleksi terurut terbalik
    $timelineData = $last5Items->concat($last5Locations)->concat($last5Allocations)->sortByDesc('created_at');
    

    return view('dashboard', compact('timelineData'));
    }

}
