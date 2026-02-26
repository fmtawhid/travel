<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::latest()->paginate(10);
        return view('admin.teams.index', compact('teams'));
    }

    public function create()
    {
        return view('admin.teams.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'youtube' => 'nullable|url',
            'email' => 'nullable|email|max:255',
            'location' => 'nullable|string|max:255',
            'whatsapp_number' => 'nullable|string|max:20',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/teams'), $filename);
            $data['image'] = $filename;
        }

        Team::create($data);

        return redirect()->route('admin.teams.index')->with('success', 'Team member added successfully!');
    }

    public function show(Team $team)
    {
        return view('admin.teams.show', compact('team'));
    }

    public function edit(Team $team)
    {
        return view('admin.teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'youtube' => 'nullable|url',
            'email' => 'nullable|email|max:255',
            'location' => 'nullable|string|max:255',
            'whatsapp_number' => 'nullable|string|max:20',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($team->image && file_exists(public_path('uploads/teams/' . $team->image))) {
                unlink(public_path('uploads/teams/' . $team->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/teams'), $filename);
            $data['image'] = $filename;
        }

        $team->update($data);

        return redirect()->route('admin.teams.index')->with('success', 'Team member updated successfully!');
    }

    public function destroy(Team $team)
    {
        // Delete image
        if ($team->image && file_exists(public_path('uploads/teams/' . $team->image))) {
            unlink(public_path('uploads/teams/' . $team->image));
        }

        $team->delete();

        return redirect()->route('admin.teams.index')->with('success', 'Team member deleted successfully!');
    }
}
