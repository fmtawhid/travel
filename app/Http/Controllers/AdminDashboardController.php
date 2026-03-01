<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use App\Models\TourBooking;
use App\Models\User;
use App\Models\HotelBooking;
use App\Models\CarBooking;
use App\Models\FlightBooking;
use App\Models\CustomBooking;
use App\Models\EventBooking;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = User::count();
        $paidAmount = Payment::where('status', 'completed')->sum('amount');
        $pendingAmount = Payment::where('status', 'pending')->sum('amount');
        $totalenquiries = TourBooking::count() + HotelBooking::count() + CarBooking::count() + FlightBooking::count() + CustomBooking::count() + EventBooking::count();

        // Fetch completed payments with all booking relationships (limit to 5 for dashboard)
        $completedPayments = Payment::with([
            'tourBooking.user',
            'hotelBooking.user',
            'carBooking.user',
            'flightBooking.user',
            'customBooking.user'
        ])
            ->where('status', 'completed')
            ->latest()
            ->limit(5)
            ->get();

        // Fetch pending/processing payments with all booking relationships (limit to 5 for dashboard)
        $pendingPayments = Payment::with([
            'tourBooking.user',
            'hotelBooking.user',
            'carBooking.user',
            'flightBooking.user',
            'customBooking.user'
        ])
            ->whereIn('status', ['pending', 'processing', 'requested'])
            ->latest()
            ->limit(5)
            ->get();

        // Fetch users with their booking and review counts (limit to 5 for dashboard)
        $users = User::withCount([
            'tourBookings',
            'hotelBookings',
            'carBookings',
            'flightBookings',
            'customBookings',
            'reviews'
        ])
            ->latest()
            ->limit(5)
            ->get();

        // Fetch tour bookings enquiries (limit to 5 for dashboard)
        $tourBookingsEnquiry = TourBooking::with('user', 'tour')
            ->latest()
            ->limit(5)
            ->get();

        // Fetch hotel bookings (limit to 5 for dashboard)
        $hotelBookingsEnquiry = HotelBooking::with('user', 'hotel')
            ->latest()
            ->limit(5)
            ->get();

        // Fetch car bookings (limit to 5 for dashboard)
        $carBookingsEnquiry = CarBooking::with('user')
            ->latest()
            ->limit(5)
            ->get();

        // Fetch flight bookings (limit to 5 for dashboard)
        $flightBookingsEnquiry = FlightBooking::with('user')
            ->latest()
            ->limit(5)
            ->get();

        // Fetch custom bookings (limit to 5 for dashboard)
        $customBookingsEnquiry = CustomBooking::with('user')
            ->latest()
            ->limit(5)
            ->get();

        // Fetch event bookings (limit to 5 for dashboard)
        $eventBookingsEnquiry = EventBooking::with('user', 'event')
            ->latest()
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'user', 
            'paidAmount', 
            'pendingAmount', 
            'totalenquiries', 
            'completedPayments', 
            'pendingPayments',
            'users',
            'tourBookingsEnquiry',
            'hotelBookingsEnquiry',
            'carBookingsEnquiry',
            'flightBookingsEnquiry',
            'customBookingsEnquiry',
            'eventBookingsEnquiry'
        ));
    }
}
