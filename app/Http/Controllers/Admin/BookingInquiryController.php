<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourBooking;
use App\Models\CarBooking;

class BookingInquiryController extends Controller
{
    public function tour_package_inquiries()
    {
        $inquiries = TourBooking::latest()->paginate(10);
        return view('admin.booking_inquiries.tour_package', compact('inquiries'));
    }
    public function destroy_tour_package($id)
    {
        $inquiry = TourBooking::findOrFail($id);
        $inquiry->delete();

        return redirect()->back()->with('success', 'Inquiry deleted successfully!');
    }





    // Car - show all bookings
    public function car_booking_inquiries()
    {
        $bookings = CarBooking::latest()->paginate(10);
        return view('admin.booking_inquiries.car', compact('bookings'));
    }

    // Delete a booking
    public function destroy_car_booking($id)
    {
        $booking = CarBooking::findOrFail($id);
        $booking->delete();
        return redirect()->back()->with('success', 'Car booking deleted successfully!');
    }
}
