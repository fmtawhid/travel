<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomBooking;
use Illuminate\Http\Request;

class CustomBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = CustomBooking::with('user')->latest()->paginate(10);
        return view('admin.custom-bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.custom-bookings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'howmanytravellers' => 'nullable|integer|min:1',
            'city' => 'nullable|string|max:255',
            'arrival' => 'nullable|date',
            'departure' => 'nullable|date|after_or_equal:arrival',
            'noofadults' => 'nullable|integer|min:1',
            'noofchildrens' => 'nullable|integer|min:0',
            'minprice' => 'nullable|numeric|min:0',
            'maxprice' => 'nullable|numeric|min:0',
        ]);

        CustomBooking::create($request->all());

        return redirect()->route('admin.custom-bookings.index')->with('success', 'Custom booking created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomBooking $customBooking)
    {
        return view('admin.custom-bookings.show', compact('customBooking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomBooking $customBooking)
    {
        return view('admin.custom-bookings.edit', compact('customBooking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomBooking $customBooking)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'howmanytravellers' => 'nullable|integer|min:1',
            'city' => 'nullable|string|max:255',
            'arrival' => 'nullable|date',
            'departure' => 'nullable|date|after_or_equal:arrival',
            'noofadults' => 'nullable|integer|min:1',
            'noofchildrens' => 'nullable|integer|min:0',
            'minprice' => 'nullable|numeric|min:0',
            'maxprice' => 'nullable|numeric|min:0',
        ]);

        $customBooking->update($request->all());

        return redirect()->route('admin.custom-bookings.index')->with('success', 'Custom booking updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomBooking $customBooking)
    {
        $customBooking->delete();
        return redirect()->route('admin.custom-bookings.index')->with('success', 'Custom booking deleted successfully!');
    }
}
