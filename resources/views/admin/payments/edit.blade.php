@extends('layouts.admin')

@section('content')

<div class="sb2-2">
    <div class="sb2-2-add-blog sb2-2-1">
        <div class="box-inn-sp">

            <div class="inn-title">
                <h4>Edit Payment #{{ $payment->id }}
                    <a href="{{ route('admin.payments.index') }}" 
                       class="btn-small waves-effect waves-light right">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </h4>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.payments.update', $payment->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">

                    <!-- Booking Type -->
                    <div class="input-field col s12">
                        <select id="booking_type" required onchange="updateBookingSelect(this.value)">
                            <option value="" disabled selected>-- Select Booking Type --</option>
                            <option value="tour" {{ $payment->tour_booking_id ? 'selected' : '' }}>Tour Booking</option>
                            <option value="hotel" {{ $payment->hotel_booking_id ? 'selected' : '' }}>Hotel Booking</option>
                            <option value="car" {{ $payment->car_booking_id ? 'selected' : '' }}>Car Booking</option>
                            <option value="flight" {{ $payment->flight_booking_id ? 'selected' : '' }}>Flight Booking</option>
                            <option value="custom" {{ $payment->custom_booking_id ? 'selected' : '' }}>Custom Booking</option>
                        </select>
                        <label>Select Booking Type</label>
                    </div>

                    <!-- Tour Booking -->
                    <div class="input-field col s12" id="tour_booking_group" style="display:none;">
                        <select name="tour_booking_id" id="tour_booking_id">
                            <option value="" disabled selected>-- Select Tour Booking --</option>
                            @foreach($tourBookings as $booking)
                                <option value="{{ $booking->id }}" {{ $payment->tour_booking_id == $booking->id ? 'selected' : '' }}>
                                    Tour #{{ $booking->id }} - {{ $booking->name }}
                                </option>
                            @endforeach
                        </select>
                        <label>Tour Booking</label>
                    </div>

                    <!-- Hotel Booking -->
                    <div class="input-field col s12" id="hotel_booking_group" style="display:none;">
                        <select name="hotel_booking_id" id="hotel_booking_id">
                            <option value="" disabled selected>-- Select Hotel Booking --</option>
                            @foreach($hotelBookings as $booking)
                                <option value="{{ $booking->id }}" {{ $payment->hotel_booking_id == $booking->id ? 'selected' : '' }}>
                                    Hotel #{{ $booking->id }} - {{ $booking->name }}
                                </option>
                            @endforeach
                        </select>
                        <label>Hotel Booking</label>
                    </div>

                    <!-- Car Booking -->
                    <div class="input-field col s12" id="car_booking_group" style="display:none;">
                        <select name="car_booking_id" id="car_booking_id">
                            <option value="" disabled selected>-- Select Car Booking --</option>
                            @foreach($carBookings as $booking)
                                <option value="{{ $booking->id }}" {{ $payment->car_booking_id == $booking->id ? 'selected' : '' }}>
                                    Car #{{ $booking->id }} - {{ $booking->name }}
                                </option>
                            @endforeach
                        </select>
                        <label>Car Booking</label>
                    </div>

                    <!-- Flight Booking -->
                    <div class="input-field col s12" id="flight_booking_group" style="display:none;">
                        <select name="flight_booking_id" id="flight_booking_id">
                            <option value="" disabled selected>-- Select Flight Booking --</option>
                            @foreach($flightBookings as $booking)
                                <option value="{{ $booking->id }}" {{ $payment->flight_booking_id == $booking->id ? 'selected' : '' }}>
                                    Flight #{{ $booking->id }} - {{ $booking->name }}
                                </option>
                            @endforeach
                        </select>
                        <label>Flight Booking</label>
                    </div>

                    <!-- Custom Booking -->
                    <div class="input-field col s12" id="custom_booking_group" style="display:none;">
                        <select name="custom_booking_id" id="custom_booking_id">
                            <option value="" disabled selected>-- Select Custom Booking --</option>
                            @foreach($customBookings as $booking)
                                <option value="{{ $booking->id }}" {{ $payment->custom_booking_id == $booking->id ? 'selected' : '' }}>
                                    Custom #{{ $booking->id }} - {{ $booking->name }}
                                </option>
                            @endforeach
                        </select>
                        <label>Custom Booking</label>
                    </div>

                    <!-- Amount -->
                    <div class="input-field col s6">
                        <input type="number" name="amount" step="0.01" min="0.01" 
                               value="{{ $payment->amount }}" required>
                        <label>Amount</label>
                    </div>

                    <!-- Status -->
                    <div class="input-field col s6">
                        <select name="status" required>
                            <option value="" disabled selected>-- Select Status --</option>
                            <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="completed" {{ $payment->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="failed" {{ $payment->status == 'failed' ? 'selected' : '' }}>Failed</option>
                            <option value="cancelled" {{ $payment->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        <label>Status</label>
                    </div>

                    <!-- Description -->
                    <div class="input-field col s12">
                        <textarea name="description" class="materialize-textarea">{{ $payment->description }}</textarea>
                        <label>Description</label>
                    </div>

                </div>

                <!-- Submit Button -->
                <div class="row">
                    <div class="input-field col s12">
                        <button type="submit" 
                                class="waves-effect waves-light btn-large blue">
                            <i class="fa fa-save"></i> Update Payment
                        </button>
                        <a href="{{ route('admin.payments.index') }}" 
                           class="waves-effect waves-light btn-large grey">
                            Cancel
                        </a>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
function updateBookingSelect(type) {

    const groups = [
        'tour_booking_group',
        'hotel_booking_group',
        'car_booking_group',
        'flight_booking_group',
        'custom_booking_group'
    ];

    // Hide all except the selected one - keep selected one visible
    groups.forEach(id => {
        if(type && id === type + '_booking_group'){
            document.getElementById(id).style.display = 'block';
        } else {
            document.getElementById(id).style.display = 'none';
        }
    });
}

// Reinitialize Materialize Select on page load and trigger booking type selection
document.addEventListener('DOMContentLoaded', function() {
    // Get booking type from URL parameters FIRST
    const urlParams = new URLSearchParams(window.location.search);
    const bookingType = urlParams.get('booking_type');
    const bookingId = urlParams.get('booking_id');
    
    // Initialize all selects
    var elems = document.querySelectorAll('select');
    M.FormSelect.init(elems);
    
    // Small delay to ensure Materialize has fully initialized
    setTimeout(function() {
        // If booking_type is in URL, set it and show the field immediately
        if (bookingType) {
            const bookingTypeSelect = document.getElementById('booking_type');
            bookingTypeSelect.value = bookingType;
            
            // Update Materialize's internal state
            M.FormSelect.init([bookingTypeSelect]);
            
            // Show the correct booking field
            updateBookingSelect(bookingType);
            
            // Then set the booking ID if present
            if (bookingId) {
                const bookingSelectId = bookingType + '_booking_id';
                const bookingSelect = document.getElementById(bookingSelectId);
                if (bookingSelect) {
                    bookingSelect.value = bookingId;
                    M.FormSelect.init([bookingSelect]);
                }
            }
        }
    }, 50);
});

// Keep the selected field always visible when changing to other fields
document.getElementById('booking_type').addEventListener('change', function() {
    const newType = this.value;
    if(newType) {
        updateBookingSelect(newType);
        // Reinitialize the newly selected booking select
        const bookingSelectId = newType + '_booking_id';
        const bookingSelect = document.getElementById(bookingSelectId);
        if (bookingSelect) {
            setTimeout(function() {
                M.FormSelect.init([bookingSelect]);
            }, 100);
        }
    }
});
</script>

@endsection
