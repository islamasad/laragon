<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $themes = Theme::latest()->get();

        return view('theme/index')->with([
            'themes' => $themes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('theme/create')->with([
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string',],
            'route' => ['required', 'string',],
        ]);
        
        Theme::create([
            'name' => $request->name,
            'route' => 'theme/themes/' . $request->route,
        ]);

        return redirect()->route('theme.index')->with('success', 'Berhasil menambahkan tema');
    }

    /**
     * Display the specified resource.
     */
    public function show(Theme $theme)
    {
        return view($theme->route)->with([
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Theme $theme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Theme $theme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Theme $theme)
    {
        $theme->delete();

        if ($request->header('HX-Request')) {
            return '';
        }

        return redirect()->route('theme.index');
        //return redirect()->route('theme.index')->with('success', 'Berhasil menghapus tema');
    }
}
