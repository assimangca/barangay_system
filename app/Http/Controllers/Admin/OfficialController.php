<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Official;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfficialController extends Controller
{
    /**
     * Display a listing of the officials in the admin panel.
     */
    public function index()
    {
        $officials = Official::orderBy('order_priority', 'asc')->get();
        return view('admin.officials.index', compact('officials'));
    }

    /**
     * Show the form for creating a new official.
     */
    public function create()
    {
        return view('admin.officials.create');
    }

    /**
     * Store a newly created official in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'term_years' => 'required|string',
            'order_priority' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            // Stores the image in storage/app/public/officials
            $path = $request->file('image')->store('officials', 'public');
            $validated['image'] = $path;
        }

        Official::create($validated);

        return redirect()->route('admin.officials.index')
            ->with('success', 'Official added successfully!');
    }

    /**
     * Show the form for editing the specified official.
     */
    public function edit(Official $official)
    {
        return view('admin.officials.edit', compact('official'));
    }

    /**
     * Update the specified official in storage.
     */
    public function update(Request $request, Official $official)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'term_years' => 'required|string',
            'order_priority' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if a new one is uploaded
            if ($official->image) {
                Storage::disk('public')->delete($official->image);
            }
            $path = $request->file('image')->store('officials', 'public');
            $validated['image'] = $path;
        }

        $official->update($validated);

        return redirect()->route('admin.officials.index')
            ->with('success', 'Official updated successfully!');
    }

    /**
     * Remove the specified official from storage.
     */
    public function destroy(Official $official)
    {
        // Delete the photo from storage if it exists
        if ($official->image) {
            Storage::disk('public')->delete($official->image);
        }

        $official->delete();

        return redirect()->route('admin.officials.index')
            ->with('success', 'Official deleted successfully!');
    }
}