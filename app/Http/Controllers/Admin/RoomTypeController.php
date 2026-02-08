<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use App\Models\Hotel;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function index()
    {
        $roomTypes = RoomType::with('hotel')->latest()->paginate(10);
        return view('admin.room_types.index', compact('roomTypes'));
    }

    public function create()
    {
        $hotels = Hotel::all();
        return view('admin.room_types.create', compact('hotels'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'room_type' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'images' => 'nullable|array',
        ]);

        if ($request->has('images')) {
            $data['images'] = json_encode($request->images);
        }

        RoomType::create($data);

        return redirect()->route('admin.room-types.index')->with('success', 'Room Type created successfully.');
    }

    public function show(string $id)
    {
        $roomType = RoomType::findOrFail($id);
        return view('admin.room_types.show', compact('roomType'));
    }

    public function edit(string $id)
    {
        $roomType = RoomType::findOrFail($id);
        $hotels = Hotel::all();
        return view('admin.room_types.edit', compact('roomType', 'hotels'));
    }

    public function update(Request $request, string $id)
    {
        $roomType = RoomType::findOrFail($id);

        $data = $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'room_type' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'images' => 'nullable|array',
        ]);

        if ($request->has('images')) {
            $data['images'] = json_encode($request->images);
        }

        $roomType->update($data);

        return redirect()->route('admin.room-types.index')->with('success', 'Room Type updated successfully.');
    }

    public function destroy(string $id)
    {
        $roomType = RoomType::findOrFail($id);
        $roomType->delete();
        return redirect()->route('admin.room-types.index')->with('success', 'Room Type deleted successfully.');
    }
}
