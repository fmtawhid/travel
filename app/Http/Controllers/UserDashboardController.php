<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserDashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('user.dashboard');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('user.my-profile', compact('user'));
    }

    public function edit_profile()
    {
        $user = Auth::user();
        return view('user.my-profile-edit', compact('user'));
    }

    public function update_profile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email,' . $user->id,
            'phone'         => 'nullable|string|max:20',
            'city'          => 'nullable|string|max:100',
            'country'       => 'nullable|string|max:100',
            'date_of_birth' => 'nullable|date',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password'      => 'nullable|confirmed|min:6'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->date_of_birth = $request->date_of_birth;

        // Image Upload
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/users'), $imageName);
            $user->image = $imageName;
        }

        // Password Update
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('user.profile')
            ->with('success', 'Profile Updated Successfully');
    }



    public function travel_booking()
    {
        return view('user.travel-booking');
    }
    public function travel_booking_details()
    {
        return view('user.travel-booking-details');
    }
    public function hotel_booking()
    {
        return view('user.hotel-booking');
    }
    public function hotel_booking_details()
    {
        return view('user.hotel-booking-details');
    }
    public function event_booking()
    {
        return view('user.event-booking');
    }
    public function event_booking_details()
    {
        return view('user.event-booking-details');
    }

    


    public function payment(Request $request)
    {
        return view('user.payment');
    }

    public function claim_refund(Request $request)
    {
        return view('user.claim-refund');
    }
}
