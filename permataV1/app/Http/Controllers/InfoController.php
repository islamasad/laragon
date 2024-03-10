<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Http\Response; 
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('infos.index', [
            'infos' => Info::with('user')->latest()->get(),
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
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
 
        $request->user()->infos()->create($validated);
 
        return redirect(route('infos.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Info $info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Info $info): View
    {
        $this->authorize('update', $info);
 
        return view('infos.edit', [
            'info' => $info,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Info $info): RedirectResponse
    {
        $this->authorize('update', $info);
 
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
 
        $info->update($validated);
 
        return redirect(route('infos.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Info $info): RedirectResponse
    {
        $this->authorize('delete', $info);
 
        $info->delete();
 
        return redirect(route('infos.index'));
    }
}
