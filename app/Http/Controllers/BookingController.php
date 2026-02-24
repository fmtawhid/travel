<?php

namespace App\Http\Controllers;
use App\Models\Package;
use App\Models\TourBooking;
use App\Models\CarBooking;
use App\Models\FlightBooking;
use App\Models\Tour;
use App\Models\Hotel;
use App\Models\RoomType;
use App\Models\HotelBooking;
use App\Models\Event;
use App\Models\EventBooking;
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
            'tour_id'        => 'nullable|exists:tours,id',
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
            'tour_id'        => $request->tour_id,
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

    public function storeFlightBooking(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'flying_from' => 'required|string|max:255',
            'flying_to' => 'required|string|max:255',
            'arrival_date' => 'required|date',
            'departure_date' => 'required|date|after_or_equal:arrival_date',
            'no_of_adults' => 'required|integer|min:1',
            'no_of_childrens' => 'nullable|integer|min:0',
        ]);

        FlightBooking::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'flying_from' => $request->flying_from,
            'flying_to' => $request->flying_to,
            'arrival_date' => $request->arrival_date,
            'departure_date' => $request->departure_date,
            'no_of_adults' => $request->no_of_adults,
            'no_of_childrens' => $request->no_of_childrens,
            'min_price' => $request->min_price,
            'max_price' => $request->max_price,
        ]);

        return back()->with('success', 'Flight booking submitted successfully!');
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

    
    public function hotel(Request $request)
    {
        $hotels = Hotel::with('roomTypes')->get(); // Load hotels with their room types
        $selectedHotelId = $request->query('hotel_id'); // Get hotel_id from URL parameter
        $user = Auth::user(); // Get authenticated user
        return view('template.booking.hotel', compact('hotels', 'selectedHotelId', 'user'));
    }

    public function storeHotelBooking(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'phone'=>'required|string|max:20',
            'email'=>'required|email|max:255',
            'hotel_id'=>'required|exists:hotels,id',
            'checkin'=>'required|date_format:m/d/Y',
            'checkout'=>'required|date_format:m/d/Y|after_or_equal:checkin',
            'noofrooms'=>'required|integer|min:1',
            'room_type_id'=>'nullable|exists:room_types,id',
            'noofadults'=>'required|integer|min:1',
        ]);

        // Convert dates from mm/dd/yyyy to yyyy-mm-dd format
        $checkin = \DateTime::createFromFormat('m/d/Y', $request->checkin)->format('Y-m-d');
        $checkout = \DateTime::createFromFormat('m/d/Y', $request->checkout)->format('Y-m-d');

        HotelBooking::create([
            'user_id'=> auth()->id(),
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'hotel_id'=>$request->hotel_id,
            'check_in'=>$checkin,
            'check_out'=>$checkout,
            'no_of_rooms'=>$request->noofrooms,
            'room_type_id'=>$request->room_type_id ?? null,
            'no_of_adults'=>$request->noofadults,
            'no_of_childrens'=>$request->noofchildrens,
            'min_price'=>$request->minprice,
            'max_price'=>$request->maxprice,
        ]);

        return back()->with('success', 'Hotel booking submitted successfully!');
    }

    public function event($event_id = null)
    {
        $event = null;
        if ($event_id) {
            $event = Event::findOrFail($event_id);
        }
        return view('template.booking.event', compact('event'));
    }

    public function storeEventBooking(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'note' => 'nullable|string|max:1000',
        ]);

        EventBooking::create([
            'user_id' => Auth::id(),
            'event_id' => $request->event_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'note' => $request->note,
        ]);

        return back()->with('success', 'Event booking submitted successfully!');
    }

}
