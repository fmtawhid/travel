<?php

namespace App\Http\Controllers;
use App\Models\Package;
use App\Models\TourBooking;
use App\Models\CarBooking;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function tour_package($tour_id = null)
    {
        $packages = Package::all();
        $destinations = Tour::select('location')->distinct()->get();

        // যদি specific tour select করা থাকে
        $tour = null;
        if ($tour_id) {
            \Log::info('Loading tour with ID: ' . $tour_id);
            $tour = Tour::with('package')->find($tour_id);
            
            if ($tour) {
                \Log::info('Tour loaded successfully', [
                    'id' => $tour->id,
                    'package_id' => $tour->package_id,
                    'start_date' => $tour->start_date,
                    'end_date' => $tour->end_date,
                    'location' => $tour->location
                ]);
            } else {
                \Log::warning('Tour not found with ID: ' . $tour_id);
            }
        } else {
            \Log::info('No tour_id provided in URL');
        }

        return view('template.booking.tour-package', compact('packages', 'destinations', 'tour'));
    }


    // Store the booking
    public function storeTourBooking(Request $request)
    {
        $request->validate([
            'package_id'     => 'required|exists:packages,id',
            'name'           => 'required|string|max:255',
            'phone'          => 'required|string|max:20',
            'email'          => 'required|email|max:255',
            'city'           => 'required|string|max:255',
            'arrival'        => 'required|date',
            'departure'      => 'required|date|after_or_equal:arrival',
            'noofadults'     => 'required|integer|min:1',
            'noofchildrens'  => 'nullable|integer|min:0',
        ]);

        TourBooking::create([
            'user_id'        => Auth::id(), // null if guest
            'package_id'     => $request->package_id,
            'name'           => $request->name,
            'phone'          => $request->phone,
            'email'          => $request->email,
            'city'           => $request->city,
            'arrival'        => $request->arrival,
            'departure'      => $request->departure,
            'noofadults'     => $request->noofadults,
            'noofchildrens'  => $request->noofchildrens,
        ]);

        return back()->with('success', 'Tour booking submitted successfully!');
    }

    public function flight()
    {
        return view('template.booking.flight');
    }

    public function car()
    {
        return view('template.booking.car-rentals');
    }

    public function storeCarBooking(Request $request)
    {
        $request->validate([
            'name'             => 'required|string|max:255',
            'phone'            => 'required|string|max:20',
            'email'            => 'required|email|max:255',
            'pickup_location'  => 'required|string|max:255',
            'dropoff_location' => 'required|string|max:255',
            'pickup_date'      => 'required|date',
            'dropoff_date'     => 'required|date|after_or_equal:pickup_date',
            'pickup_time'      => 'required|string|max:10',
            'dropoff_time'     => 'required|string|max:10',
            'car_type'         => 'required|string|max:50',
            'total_passengers' => 'required|integer|min:1',
            'no_of_adults'     => 'required|integer|min:1',
            'no_of_childrens'  => 'nullable|integer|min:0',
            'min_price'        => 'nullable|string|max:20',
            'max_price'        => 'nullable|string|max:20',
        ]);

        CarBooking::create([
            'user_id'          => auth()->id(),
            'name'             => $request->name,
            'phone'            => $request->phone,
            'email'            => $request->email,
            'pickup_location'  => $request->pickup_location,
            'dropoff_location' => $request->dropoff_location,
            'pickup_date'      => $request->pickup_date,
            'dropoff_date'     => $request->dropoff_date,
            'pickup_time'      => $request->pickup_time,
            'dropoff_time'     => $request->dropoff_time,
            'car_type'         => $request->car_type,
            'total_passengers' => $request->total_passengers,
            'no_of_adults'     => $request->no_of_adults,
            'no_of_childrens'  => $request->no_of_childrens,
            'min_price'        => $request->min_price,
            'max_price'        => $request->max_price,
        ]);

        return back()->with('success', 'Car booking submitted successfully!');
    }

    
    public function hotel()
    {
        return view('template.booking.hotel');
    }


}
