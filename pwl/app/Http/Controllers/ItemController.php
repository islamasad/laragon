<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use App\Models\Location;
use App\Models\Allocation;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil data item dari database
        $items = Item::latest();

        // Memformat harga item menjadi format mata uang Rp
        foreach ($items as $item) {
            $item->price = 'Rp ' . number_format($item->price, 0, ',', '.');
        }

        // Melakukan pencarian jika ada request 'search'
        if ($request->has('search')) {
            $searchTerm = '%' . $request->input('search') . '%';
            $items->where('name', 'LIKE', $searchTerm);
        }

        // Mengambil data allocation dari database dengan relasi ke User, Item, dan Location
        $allocations = Allocation::with('author', 'item', 'location')->get();

        // Mengirim data item, allocation, user, item, dan location ke view
        return view('item.index')->with([
            'items' => $items->get(),
            //'allocations' => $allocations,
            //'users' => User::all(['id', 'name']), // Ambil kolom id dan name dari tabel users
            //'items' => Item::all(['id', 'name', 'quantity']), // Ambil kolom id, name, dan quantity dari tabel items
            //'locations' => Location::all(['id', 'name']), // Ambil kolom id dan name dari tabel locations
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'quantity' => ['required', 'string'],
            
        ]);

        $item = Item::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'author_id' => Auth::guard('web')->user()->id,
        ]);

        return redirect('item/index');
    }

    public function show(Request $request)
    {
        $id = $request->route('id'); // Mengambil nilai ID dari URL
        $item = Item::with('author')->find($id);
        $item = Item::with(['locations'])->find($id);
        
        // Pastikan item ditemukan dalam database
        if (!$item) {
            abort(404);
        }

        // Memformat harga item menjadi format mata uang Rp
        $item->price = 'Rp ' . number_format($item->price, 0, ',', '.');

        $authorName = $item->author->name;

        return view('item.show', compact('item', 'authorName'));
    }

    public function destroy(Request $request)
    {
        $id = $request->route('id');
        $item = Item::find($id);

        $requestData = $request->quantity;
        $databaseData = $item->quantity;

        if ($requestData == $databaseData) {
            // If the requested quantity is the same as the database data, delete the entire item.
            $item->delete();
        } else {
            // If the requested quantity is different, update the quantity in the database.
            $newQuantity = $databaseData - $requestData;
            $item->quantity = $newQuantity;
            $item->save();
        }

        return redirect('item/index');
    }
        
}
