@extends('layouts.master')
@section('content')

<section>
    <div class="v2-hom-search">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="v2-ho-se-ri">
                        <h5>World's leading tour and travels template</h5>
                        <h1>Flight Booking to your travel!</h1>
                        <p>Experience exciting travel packages, make hotel reservations, search flights and events</p>
                        <div class="ban-shrt-cut-link">
                            <ul>
                                <li><a href="{{ route('booking.tour-package') }}" class="waves-effect waves-light btn-large tourz-pop-ser-btn"><img src="{{ asset('assets/templates/images/icon/2.png') }}" alt=""> Tour</a></li>
                                <li><a href="{{ route('booking.flight') }}" class="waves-effect waves-light btn-large tourz-pop-ser-btn"><img src="{{ asset('assets/templates/images/icon/31.png') }}" alt=""> Flight</a></li>
                                <li><a href="{{ route('booking.car') }}" class="waves-effect waves-light btn-large tourz-pop-ser-btn"><img src="{{ asset('assets/templates/images/icon/30.png') }}" alt=""> Car Rentals</a></li>
                                <li><a href="{{ route('booking.hotel') }}" class="waves-effect waves-light btn-large tourz-pop-ser-btn"><img src="{{ asset('assets/templates/images/icon/1.png') }}" alt=""> Hotel</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="">
                        <form class="contact__form v2-search-form book-tab-form" method="post" action="{{ route('booking.flight.store') }}">
                            @csrf
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" class="validate" name="name" placeholder="Enter your name" value="{{ Auth::user()->name ?? '' }}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s6">
                                    <input type="number" class="validate" name="phone" placeholder="Enter your phone" value="{{ Auth::user()->phone ?? '' }}" required>
                                </div>
                                <div class="input-field col s6">
                                    <input type="email" class="validate" name="email" placeholder="Enter your email" value="{{ Auth::user()->email ?? '' }}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" name="flying_from" placeholder="Flying From" required>
                                </div>
                                <div class="input-field col s12">
                                    <input type="text" name="flying_to" placeholder="Flying To" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s6">
                                    <input type="text" class="datepicker" name="arrival_date" placeholder="Arrival Date" required>
                                </div>
                                <div class="input-field col s6">
                                    <input type="text" class="datepicker" name="departure_date" placeholder="Departure Date" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s6">
                                    <select class="chosen-select" name="no_of_adults">
                                        <option value="" disabled selected>No of adults</option>
                                        @for($i=1; $i<=6; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="input-field col s6">
                                    <select class="chosen-select" name="no_of_childrens">
                                        <option value="" disabled selected>No of childrens</option>
                                        @for($i=0; $i<=6; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s6">
                                    <input type="text" name="min_price" placeholder="Min Price">
                                </div>
                                <div class="input-field col s6">
                                    <input type="text" name="max_price" placeholder="Max Price">
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="submit" value="Book Now" class="waves-effect waves-light tourz-sear-btn v2-ser-btn">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
