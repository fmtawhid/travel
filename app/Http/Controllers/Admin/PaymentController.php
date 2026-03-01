<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use App\Models\TourBooking;
use App\Models\HotelBooking;
use App\Models\CarBooking;
use App\Models\FlightBooking;
use App\Models\CustomBooking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::with(['tourBooking', 'hotelBooking', 'carBooking', 'flightBooking', 'customBooking'])
            ->orderByDesc('created_at')
            ->paginate(15);
        
        return view('admin.payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get only bookings that don't have a payment yet
        $tourBookings = TourBooking::whereDoesntHave('payments')->get();
        $hotelBookings = HotelBooking::whereDoesntHave('payments')->get();
        $carBookings = CarBooking::whereDoesntHave('payments')->get();
        $flightBookings = FlightBooking::whereDoesntHave('payments')->get();
        $customBookings = CustomBooking::whereDoesntHave('payments')->get();
        
        return view('admin.payments.create', compact(
            'tourBookings',
            'hotelBookings',
            'carBookings',
            'flightBookings',
            'customBookings'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tour_booking_id' => 'nullable|exists:tour_bookings,id',
            'hotel_booking_id' => 'nullable|exists:hotel_bookings,id',
            'car_booking_id' => 'nullable|exists:car_bookings,id',
            'flight_booking_id' => 'nullable|exists:flight_bookings,id',
            'custom_booking_id' => 'nullable|exists:custom_bookings,id',
            'amount' => 'required|numeric|min:0.01',
            'status' => 'required|in:pending,completed,failed,cancelled',
            'description' => 'nullable|string|max:1000',
        ], [
            'tour_booking_id.exists' => 'Selected tour booking does not exist.',
            'hotel_booking_id.exists' => 'Selected hotel booking does not exist.',
            'car_booking_id.exists' => 'Selected car booking does not exist.',
            'flight_booking_id.exists' => 'Selected flight booking does not exist.',
            'custom_booking_id.exists' => 'Selected custom booking does not exist.',
            'amount.required' => 'Amount is required.',
            'amount.numeric' => 'Amount must be a number.',
            'amount.min' => 'Amount must be greater than 0.',
            'status.required' => 'Status is required.',
            'status.in' => 'Invalid status selected.',
        ]);

        // Ensure at least one booking ID is provided
        $bookingIds = array_filter([
            $validated['tour_booking_id'] ?? null,
            $validated['hotel_booking_id'] ?? null,
            $validated['car_booking_id'] ?? null,
            $validated['flight_booking_id'] ?? null,
            $validated['custom_booking_id'] ?? null,
        ]);

        if (empty($bookingIds)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Please select at least one booking type.');
        }

        Payment::create($validated);

        return redirect()->route('admin.payments.index')
            ->with('success', 'Payment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        $payment->load(['tourBooking', 'hotelBooking', 'carBooking', 'flightBooking', 'customBooking']);
        
        return view('admin.payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        // Get all bookings that don't have a payment, plus the current payment's booking
        $tourBookings = TourBooking::where(function($query) use ($payment) {
            $query->whereDoesntHave('payments')
                  ->orWhere('id', $payment->tour_booking_id);
        })->get();
        
        $hotelBookings = HotelBooking::where(function($query) use ($payment) {
            $query->whereDoesntHave('payments')
                  ->orWhere('id', $payment->hotel_booking_id);
        })->get();
        
        $carBookings = CarBooking::where(function($query) use ($payment) {
            $query->whereDoesntHave('payments')
                  ->orWhere('id', $payment->car_booking_id);
        })->get();
        
        $flightBookings = FlightBooking::where(function($query) use ($payment) {
            $query->whereDoesntHave('payments')
                  ->orWhere('id', $payment->flight_booking_id);
        })->get();
        
        $customBookings = CustomBooking::where(function($query) use ($payment) {
            $query->whereDoesntHave('payments')
                  ->orWhere('id', $payment->custom_booking_id);
        })->get();
        
        return view('admin.payments.edit', compact(
            'payment',
            'tourBookings',
            'hotelBookings',
            'carBookings',
            'flightBookings',
            'customBookings'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        $validated = $request->validate([
            'tour_booking_id' => 'nullable|exists:tour_bookings,id',
            'hotel_booking_id' => 'nullable|exists:hotel_bookings,id',
            'car_booking_id' => 'nullable|exists:car_bookings,id',
            'flight_booking_id' => 'nullable|exists:flight_bookings,id',
            'custom_booking_id' => 'nullable|exists:custom_bookings,id',
            'amount' => 'required|numeric|min:0.01',
            'status' => 'required|in:pending,completed,failed,cancelled',
            'description' => 'nullable|string|max:1000',
        ]);

        // Ensure at least one booking ID is provided
        $bookingIds = array_filter([
            $validated['tour_booking_id'] ?? null,
            $validated['hotel_booking_id'] ?? null,
            $validated['car_booking_id'] ?? null,
            $validated['flight_booking_id'] ?? null,
            $validated['custom_booking_id'] ?? null,
        ]);

        if (empty($bookingIds)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Please select at least one booking type.');
        }

        $payment->update($validated);

        return redirect()->route('admin.payments.index')
            ->with('success', 'Payment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->route('admin.payments.index')
            ->with('success', 'Payment deleted successfully.');
    }

    /**
     * Show payment requests list
     */
    public function paymentRequests()
    {
        $paymentRequests = \App\Models\PaymentRequest::with(['user', 'payment'])
            ->orderByDesc('created_at')
            ->paginate(15);
        
        return view('admin.payments.requests', compact('paymentRequests'));
    }

    /**
     * Confirm payment request
     */
    public function confirmPaymentRequest(\App\Models\PaymentRequest $paymentRequest)
    {
        // Update payment request status to completed
        $paymentRequest->update(['status' => 'completed']);

        // Update payment status to completed
        $paymentRequest->payment->update(['status' => 'completed']);

        return redirect()->route('admin.payments.request')
            ->with('success', 'Payment request confirmed successfully!');
    }
}
