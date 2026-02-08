<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HotelAmenity;
use Illuminate\Http\Request;

class HotelAmenityController extends Controller
{
    public function index()
    {
        $amenities = HotelAmenity::latest()->paginate(10);
        return view('admin.hotel-amenities.index', compact('amenities'));
    }

    public function create()
    {
        return view('admin.hotel-amenities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        HotelAmenity::create($request->all());

        return redirect()->route('admin.hotel-amenities.index')
            ->with('success', 'Amenity created successfully!');
    }

    public function edit(HotelAmenity $hotelAmenity)
    {
        return view('admin.hotel-amenities.edit', compact('hotelAmenity'));
    }

    public function update(Request $request, HotelAmenity $hotelAmenity)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $hotelAmenity->update($request->all());

        return redirect()->route('admin.hotel-amenities.index')
            ->with('success', 'Amenity updated successfully!');
    }

    public function destroy(HotelAmenity $hotelAmenity)
    {
        $hotelAmenity->delete();

        return redirect()->route('admin.hotel-amenities.index')
            ->with('success', 'Amenity deleted successfully!');
    }
}
