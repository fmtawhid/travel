<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Payment;
use App\Models\TourBooking;
use App\Models\HotelBooking;
use App\Models\EventBooking;

class UserDashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        
        // Get ONLY LATEST booking of each type for dashboard
        $tourBooking = $user->tourBookings()
            ->with(['package', 'tour'])
            ->latest()
            ->first();
        if($tourBooking) {
            $payment = Payment::where('tour_booking_id', $tourBooking->id)->latest()->first();
            $tourBooking->latest_payment = $payment;
            $tourBooking->remaining_days = $tourBooking->departure ? now()->diffInDays($tourBooking->departure, false) : null;
        }
        
        $hotelBooking = $user->hotelBookings()
            ->with(['hotel', 'roomType'])
            ->latest()
            ->first();
        if($hotelBooking) {
            $payment = Payment::where('hotel_booking_id', $hotelBooking->id)->latest()->first();
            $hotelBooking->latest_payment = $payment;
            $hotelBooking->remaining_days = $hotelBooking->check_out ? now()->diffInDays($hotelBooking->check_out, false) : null;
        }
        
        $eventBooking = $user->eventBookings()
            ->with('event')
            ->latest()
            ->first();
        if($eventBooking) {
            $payment = Payment::where('custom_booking_id', $eventBooking->id)->latest()->first();
            $eventBooking->latest_payment = $payment;
            $eventBooking->remaining_days = $eventBooking->event && $eventBooking->event->date ? now()->diffInDays($eventBooking->event->date, false) : null;
        }
        
        $carBooking = $user->carBookings()
            ->latest()
            ->first();
        if($carBooking) {
            $payment = Payment::where('car_booking_id', $carBooking->id)->latest()->first();
            $carBooking->latest_payment = $payment;
            $carBooking->remaining_days = $carBooking->pickup_date ? now()->diffInDays($carBooking->pickup_date, false) : null;
        }
        
        $flightBooking = $user->flightBookings()
            ->latest()
            ->first();
        if($flightBooking) {
            $payment = Payment::where('flight_booking_id', $flightBooking->id)->latest()->first();
            $flightBooking->latest_payment = $payment;
            $flightBooking->remaining_days = $flightBooking->departure_date ? now()->diffInDays($flightBooking->departure_date, false) : null;
        }
        
        $customBooking = $user->customBookings()
            ->latest()
            ->first();
        if($customBooking) {
            $payment = Payment::where('custom_booking_id', $customBooking->id)->latest()->first();
            $customBooking->latest_payment = $payment;
            $customBooking->remaining_days = $customBooking->departure ? now()->diffInDays($customBooking->departure, false) : null;
        }
        
        return view('user.dashboard', compact(
            'tourBooking', 'hotelBooking', 'eventBooking', 
            'carBooking', 'flightBooking', 'customBooking', 'user'
        ));
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
        $user = Auth::user();
        $bookings = $user->tourBookings()->with(['package', 'tour'])->latest()->get();
        return view('user.travel-booking', compact('bookings'));
    }
    public function travel_booking_details($id)
    {
        $user = Auth::user();
        $booking = $user->tourBookings()->with(['package', 'tour'])->findOrFail($id);
        return view('user.travel-booking-details', compact('booking'));
    }
    public function hotel_booking()
    {
        $user = Auth::user();
        $bookings = $user->hotelBookings()->with(['hotel', 'roomType'])->latest()->get();
        return view('user.hotel-booking', compact('bookings'));
    }
    public function hotel_booking_details($id)
    {
        $user = Auth::user();
        $booking = $user->hotelBookings()->with(['hotel', 'roomType'])->findOrFail($id);
        return view('user.hotel-booking-details', compact('booking'));
    }
    public function car_booking()
    {
        $user = Auth::user();
        $bookings = $user->carBookings()->latest()->get();
        return view('user.car-booking', compact('bookings'));
    }
    public function car_booking_details($id)
    {
        $user = Auth::user();
        $booking = $user->carBookings()->findOrFail($id);
        return view('user.car-booking-details', compact('booking'));
    }
    public function flight_booking()
    {
        $user = Auth::user();
        $bookings = $user->flightBookings()->latest()->get();
        return view('user.flight-booking', compact('bookings'));
    }
    public function flight_booking_details($id)
    {
        $user = Auth::user();
        $booking = $user->flightBookings()->findOrFail($id);
        return view('user.flight-booking-details', compact('booking'));
    }
    public function event_booking()
    {
        $user = Auth::user();
        $bookings = $user->eventBookings()->with('event')->latest()->get();
        return view('user.event-booking', compact('bookings'));
    }
    public function event_booking_details($id)
    {
        $user = Auth::user();
        $booking = $user->eventBookings()->with('event')->findOrFail($id);
        return view('user.event-booking-details', compact('booking'));
    }

    public function custom_booking()
    {
        $user = Auth::user();
        $bookings = $user->customBookings()->latest()->get();
        return view('user.custom-booking', compact('bookings'));
    }

    public function custom_booking_details($id)
    {
        $user = Auth::user();
        $booking = $user->customBookings()->findOrFail($id);
        return view('user.custom-booking-details', compact('booking'));
    }

    


    public function payment(Request $request)
    {
        $user = Auth::user();
        $paymentMethods = $user->paymentMethods;
        
        // Get amount and payment_id from query parameters if available
        $amount = $request->query('amount', null);
        $paymentId = $request->query('payment_id', null);
        
        // If coming from payment details page
        if ($amount && $paymentId) {
            $payment = Payment::find($paymentId);
            if ($payment && $payment->getBooking()->user_id === $user->id) {
                // Create a payment request
                \App\Models\PaymentRequest::create([
                    'user_id' => $user->id,
                    'payment_id' => $paymentId,
                    'amount' => $amount,
                    'status' => 'requested',
                ]);
            }
        }
        
        return view('user.payment', compact('paymentMethods', 'amount', 'paymentId'));
    }

    public function paymentsList(Request $request)
    {
        $user = Auth::user();
        
        // Get payments for all bookings belonging to this user
        $payments = Payment::whereHas('tourBooking', function($q) use ($user) {
                $q->where('user_id', $user->id);
            })->orWhereHas('hotelBooking', function($q) use ($user) {
                $q->where('user_id', $user->id);
            })->orWhereHas('carBooking', function($q) use ($user) {
                $q->where('user_id', $user->id);
            })->orWhereHas('flightBooking', function($q) use ($user) {
                $q->where('user_id', $user->id);
            })->orWhereHas('customBooking', function($q) use ($user) {
                $q->where('user_id', $user->id);
            })->paginate(10);
        
        return view('user.payments-list', compact('payments'));
    }

    public function claim_refund(Request $request)
    {
        return view('user.claim-refund');
    }

    public function paymentRequests(Request $request)
    {
        $user = Auth::user();
        $paymentRequests = \App\Models\PaymentRequest::where('user_id', $user->id)
            ->with('payment')
            ->latest()
            ->paginate(10);
        
        return view('user.payment-requests', compact('paymentRequests'));
    }

    public function viewPaymentByBooking($bookingType, $bookingId)
    {
        $user = Auth::user();
        $payment = null;

        // Find payment based on booking type
        switch($bookingType) {
            case 'tour':
                $payment = Payment::where('tour_booking_id', $bookingId)
                    ->whereHas('tourBooking', function($q) use ($user) {
                        $q->where('user_id', $user->id);
                    })->first();
                break;
            case 'hotel':
                $payment = Payment::where('hotel_booking_id', $bookingId)
                    ->whereHas('hotelBooking', function($q) use ($user) {
                        $q->where('user_id', $user->id);
                    })->first();
                break;
            case 'car':
                $payment = Payment::where('car_booking_id', $bookingId)
                    ->whereHas('carBooking', function($q) use ($user) {
                        $q->where('user_id', $user->id);
                    })->first();
                break;
            case 'flight':
                $payment = Payment::where('flight_booking_id', $bookingId)
                    ->whereHas('flightBooking', function($q) use ($user) {
                        $q->where('user_id', $user->id);
                    })->first();
                break;
            case 'custom':
                $payment = Payment::where('custom_booking_id', $bookingId)
                    ->whereHas('customBooking', function($q) use ($user) {
                        $q->where('user_id', $user->id);
                    })->first();
                break;
        }

        if ($payment) {
            return view('user.payment-details', compact('payment'));
        } else {
            // Return with alert message
            return redirect()->back()->with([
                'error' => 'Your payment is not ready',
                'alert_type' => 'warning'
            ]);
        }
    }

    public function processPayment(Request $request)
    {
        $user = Auth::user();

        // Validate the payment form
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'payment_method_id' => 'nullable|exists:payment_methods,id',
            'card_number' => 'nullable|string',
            'expiry_date' => 'nullable|string',
            'cvv' => 'nullable|string',
            'full_name' => 'nullable|string',
            'card_name' => 'nullable|string',
        ]);

        $amount = $request->input('amount');
        $paymentMethodId = $request->input('payment_method_id');
        $paymentId = $request->input('payment_id');

        // Check if using saved card or new card
        if (!$paymentMethodId && !$request->input('card_number')) {
            return redirect()->back()->with('error', 'Please select a payment method or enter card details');
        }

        try {
            // Create payment record if coming from payment details
            if ($paymentId) {
                $payment = Payment::find($paymentId);
                if (!$payment || $payment->getBooking()->user_id !== $user->id) {
                    return redirect()->back()->with('error', 'Invalid payment');
                }

                // Payment request status remains "requested"
                // Payment status remains unchanged
                // TODO: Here you would integrate with a payment gateway (Stripe, PayPal, etc.)
            }

            return redirect()->route('user.payment-requests')
                ->with('success', 'Payment request submitted successfully! Your payment status is still pending.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Payment processing failed: ' . $e->getMessage());
        }
    }
}
