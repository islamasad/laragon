<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response; 
use Illuminate\Http\RedirectResponse;
use App\Models\Item;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil data user dari database
        $items = Item::all();

        // Mengirim data user ke view dengan menggunakan with()
        return view('item')->with('items', $items, $request);
    }

    public function store(Request $request)//: RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:items,name|string|max:255',
            'description' => 'required|string|max:255',
            'purchase_date' => 'required|date|max:255',
            'purchase_price' => 'required|decimal:2|max:255',
            'amount' => 'required|numeric|max:255',
            
        ]);
        
       
        $item = $request([
            'name' => $request->name,
            'description' => $request->description,
            'purchase_date' => $request->purchase_date,
            'purchase_price' => $request->purchase_price,
            'amount' => $request->amount,
            'author_id' => auth()->user()->id,
        ]);

        $item = Item::create($item);

        return redirect(route('dashboard.item'));
    }
}
