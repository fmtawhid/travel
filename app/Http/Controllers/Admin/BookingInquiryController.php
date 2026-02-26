<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourBooking;
use App\Models\CarBooking;
use App\Models\FlightBooking;
use App\Models\HotelBooking;
use App\Models\CustomBooking;
use App\Models\Contact;


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
    // Flight booking inquiries - show all bookings
    public function flight_booking_inquiries()
    {
        $bookings = FlightBooking::latest()->paginate(10);
        return view('admin.booking_inquiries.flight', compact('bookings'));
    }

    // Delete a flight booking
    public function destroy_flight_booking($id)
    {
        $booking = FlightBooking::findOrFail($id);
        $booking->delete();
        return redirect()->back()->with('success', 'Flight booking deleted successfully!');
    }

    // Hotel booking inquiries - show all bookings
    public function hotel_booking_inquiries()
    {
        $bookings = HotelBooking::latest()->paginate(10);
        return view('admin.booking_inquiries.hotel', compact('bookings'));
    }

    // Delete a hotel booking
    public function destroy_hotel_booking($id)
    {
        $booking = HotelBooking::findOrFail($id);
        $booking->delete();
        return redirect()->back()->with('success', 'Hotel booking deleted successfully!');
    }
    // Custom booking inquiries - show all bookings
    public function custom_booking_inquiries()
    {
        $bookings = CustomBooking::latest()->paginate(10);
        return view('admin.booking_inquiries.custom', compact('bookings'));
    }   
    // Delete a custom booking
    public function destroy_custom_booking($id)
    {
        $booking = CustomBooking::findOrFail($id);
        $booking->delete();
        return redirect()->back()->with('success', 'Custom booking deleted successfully!');
    }
    // Other booking inquiries - show all bookings
    public function other_booking_inquiries()
    {
        $bookings = Contact::latest()->paginate(10);
        return view('admin.booking_inquiries.contact', compact('bookings'));
    }   
    // Delete an other booking
    public function destroy_other_booking($id)
    {
        $booking = Contact::findOrFail($id);
        $booking->delete();
        return redirect()->back()->with('success', 'Other booking deleted successfully!');
    }
    
    
    
    }
