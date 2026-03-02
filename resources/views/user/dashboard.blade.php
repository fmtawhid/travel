@extends('layouts.user')
@section('user_dashboard')
    <!--CENTER SECTION-->
    <div class="db-2">
        <div class="db-2-com db-2-main">
            <h4>Manage Booking</h4>
            <div class="db-2-main-com">
                
                {{-- Tour Bookings --}}
                @if($tourBooking)
                    <div class="db-2-main-1">
                        <div class="db-2-main-2">
                            <img src="{{ asset('assets/templates/images/icon/db2.png') }}" alt="" />
                            <span>Travel Bookings</span>
                            <ul>
                                <li>
                                    <a href="{{ route('user.booking.tour-package-details', $tourBooking->id) }}">
                                        {{ $tourBooking->package->name ?? 'Tour Package' }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.payment') }}">
                                        Payment Status 
                                        <span class="db-{{ $tourBooking->latest_payment && $tourBooking->latest_payment->status === 'completed' ? 'done' : 'not-done' }}">
                                            {{ $tourBooking->latest_payment ? ucfirst($tourBooking->latest_payment->status) : 'Pending' }}
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.booking.tour-package-details', $tourBooking->id) }}">
                                        Remaining Days - {{ $tourBooking->remaining_days ?? 0 }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.booking.tour-package-details', $tourBooking->id) }}">
                                        Travel Date - {{ $tourBooking->departure ? $tourBooking->departure->format('d M Y') : 'N/A' }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif

                {{-- Hotel Bookings --}}
                @if($hotelBooking)
                    <div class="db-2-main-1">
                        <div class="db-2-main-2">
                            <img src="{{ asset('assets/templates/images/icon/db3.png') }}" alt="" />
                            <span>Hotel Bookings</span>
                            <ul>
                                <li>
                                    <a href="{{ route('user.booking.hotel-details', $hotelBooking->id) }}">
                                        {{ $hotelBooking->hotel->name ?? 'Hotel' }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.payment') }}">
                                        Payment Status 
                                        <span class="db-{{ $hotelBooking->latest_payment && $hotelBooking->latest_payment->status === 'completed' ? 'done' : 'not-done' }}">
                                            {{ $hotelBooking->latest_payment ? ucfirst($hotelBooking->latest_payment->status) : 'Pending' }}
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.booking.hotel-details', $hotelBooking->id) }}">
                                        Remaining Days - {{ $hotelBooking->remaining_days ?? 0 }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.booking.hotel-details', $hotelBooking->id) }}">
                                        Check-in Date - {{ $hotelBooking->check_in ? $hotelBooking->check_in->format('d M Y') : 'N/A' }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif

                {{-- Event Bookings --}}
                @if($eventBooking)
                    <div class="db-2-main-1">
                        <div class="db-2-main-2">
                            <img src="{{ asset('assets/templates/images/icon/db1.png') }}" alt="" />
                            <span>Event Bookings</span>
                            <ul>
                                <li>
                                    <a href="{{ route('user.booking.event-details', $eventBooking->id) }}">
                                        {{ $eventBooking->event->name ?? 'Event' }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.payment') }}">
                                        Payment Status 
                                        <span class="db-{{ $eventBooking->latest_payment && $eventBooking->latest_payment->status === 'completed' ? 'done' : 'not-done' }}">
                                            {{ $eventBooking->latest_payment ? ucfirst($eventBooking->latest_payment->status) : 'Pending' }}
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.booking.event-details', $eventBooking->id) }}">
                                        Remaining Days - {{ $eventBooking->remaining_days ?? 0 }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.booking.event-details', $eventBooking->id) }}">
                                        Event Date - 
                                        @if($eventBooking->event && $eventBooking->event->date)
                                            {{ \Carbon\Carbon::parse($eventBooking->event->date)->format('d M Y') }}
                                        @else
                                            N/A
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif

                {{-- Car Bookings --}}
                @if($carBooking)
                    <div class="db-2-main-1">
                        <div class="db-2-main-2">
                            <img src="{{ asset('assets/templates/images/icon/dbl8.png') }}" alt="" />
                            <span>Car Rental Bookings</span>
                            <ul>
                                <li>
                                    <a href="{{ route('user.booking.car-details', $carBooking->id) }}">
                                        {{ $carBooking->car_type ?? 'Car Rental' }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.payment') }}">
                                        Payment Status 
                                        <span class="db-{{ $carBooking->latest_payment && $carBooking->latest_payment->status === 'completed' ? 'done' : 'not-done' }}">
                                            {{ $carBooking->latest_payment ? ucfirst($carBooking->latest_payment->status) : 'Pending' }}
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.booking.car-details', $carBooking->id) }}">
                                        Remaining Days - {{ $carBooking->remaining_days ?? 0 }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.booking.car-details', $carBooking->id) }}">
                                        Pickup Date - {{ $carBooking->pickup_date ? $carBooking->pickup_date->format('d M Y') : 'N/A' }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif

                {{-- Flight Bookings --}}
                @if($flightBooking)
                    <div class="db-2-main-1">
                        <div class="db-2-main-2">
                            <img src="{{ asset('assets/templates/images/icon/dbl5.png') }}" alt="" />
                            <span>Flight Bookings</span>
                            <ul>
                                <li>
                                    <a href="{{ route('user.booking.flight-details', $flightBooking->id) }}">
                                        {{ $flightBooking->flying_from ?? 'From' }} → {{ $flightBooking->flying_to ?? 'To' }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.payment') }}">
                                        Payment Status 
                                        <span class="db-{{ $flightBooking->latest_payment && $flightBooking->latest_payment->status === 'completed' ? 'done' : 'not-done' }}">
                                            {{ $flightBooking->latest_payment ? ucfirst($flightBooking->latest_payment->status) : 'Pending' }}
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.booking.flight-details', $flightBooking->id) }}">
                                        Remaining Days - {{ $flightBooking->remaining_days ?? 0 }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.booking.flight-details', $flightBooking->id) }}">
                                        Departure Date - {{ $flightBooking->departure_date ? $flightBooking->departure_date->format('d M Y') : 'N/A' }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif

                {{-- Custom Bookings --}}
                @if($customBooking)
                    <div class="db-2-main-1">
                        <div class="db-2-main-2">
                            <img src="{{ asset('assets/templates/images/icon/28.png') }}" alt="" />
                            <span>Custom Bookings</span>
                            <ul>
                                <li>
                                    <a href="{{ route('user.booking.custom-details', $customBooking->id) }}">
                                        Custom Booking
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.payment') }}">
                                        Payment Status 
                                        <span class="db-{{ $customBooking->latest_payment && $customBooking->latest_payment->status === 'completed' ? 'done' : 'not-done' }}">
                                            {{ $customBooking->latest_payment ? ucfirst($customBooking->latest_payment->status) : 'Pending' }}
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.booking.custom-details', $customBooking->id) }}">
                                        Remaining Days - {{ $customBooking->remaining_days ?? 0 }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user.booking.custom-details', $customBooking->id) }}">
                                        Departure Date - {{ $customBooking->departure ? $customBooking->departure->format('d M Y') : 'N/A' }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif

                @if(!$tourBooking && !$hotelBooking && !$eventBooking && !$carBooking && !$flightBooking && !$customBooking)
                    <div style="text-align: center; padding: 40px; grid-column: 1/-1;">
                        <p style="font-size: 18px; color: #999;">No bookings yet. <a href="{{ route('user.booking.tour-package') }}" style="color: #2196F3;">Start booking now!</a></p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection