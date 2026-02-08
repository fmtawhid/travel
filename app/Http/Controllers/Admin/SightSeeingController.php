<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SightSeeing;
use Illuminate\Http\Request;

class SightSeeingController extends Controller
{
    // List all sightseeings
    public function index()
    {
        $sightseeings = SightSeeing::latest()->paginate(10);
        return view('admin.sightseeing.index', compact('sightseeings'));
    }

    // Show create form
    public function create()
    {
        return view('admin.sightseeing.create');
    }

    // Store new sightseeing
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
            'short_description' => 'nullable|string|max:500',
            'long_description' => 'nullable|string',
        ]);

        $data = $request->only(['name', 'short_description', 'long_description']);

        // Handle featured image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/sightseeing'), $filename);
            $data['image'] = $filename;
        }

        SightSeeing::create($data);

        return redirect()->route('admin.sightseeing.index')->with('success', 'SightSeeing created successfully.');
    }

    // Show sightseeing details
    public function show(SightSeeing $sightseeing)
    {
        return view('admin.sightseeing.show', compact('sightseeing'));
    }

    // Show edit form
    public function edit(SightSeeing $sightseeing)
    {
        return view('admin.sightseeing.edit', compact('sightseeing'));
    }

    // Update sightseeing
    public function update(Request $request, SightSeeing $sightseeing)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
            'short_description' => 'nullable|string|max:500',
            'long_description' => 'nullable|string',
        ]);

        $data = $request->only(['name', 'short_description', 'long_description']);

        // Handle featured image
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($sightseeing->image && file_exists(public_path('uploads/sightseeing/'.$sightseeing->image))) {
                unlink(public_path('uploads/sightseeing/'.$sightseeing->image));
            }

            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/sightseeing'), $filename);
            $data['image'] = $filename;
        }

        $sightseeing->update($data);

        return redirect()->route('admin.sightseeing.index')->with('success', 'SightSeeing updated successfully.');
    }

    // Delete sightseeing
    public function destroy(SightSeeing $sightseeing)
    {
        // Delete featured image
        if ($sightseeing->image && file_exists(public_path('uploads/sightseeing/'.$sightseeing->image))) {
            unlink(public_path('uploads/sightseeing/'.$sightseeing->image));
        }

        $sightseeing->delete();

        return redirect()->route('admin.sightseeing.index')->with('success', 'SightSeeing deleted successfully.');
    }
}
