@extends('layouts.master')
@section('content')

<section>
    <div class="v2-hom-search">
        <div class="container">
            <div class="row">
                <!-- Left Info -->
                <div class="col-md-6">
                    <div class="v2-ho-se-ri">
                        <h5>World's leading tour and travels template</h5>
                        <h1>Car Rentals made easy!</h1>
                        <p>Book your car quickly and conveniently. Select locations, dates, and your car type.</p>
                        <div class="ban-shrt-cut-link">
                            <ul>
                                <li><a href="{{ route('booking.tour-package') }}" class="waves-effect waves-light btn-large tourz-pop-ser-btn">
                                    <img src="{{ asset('assets/templates/images/icon/2.png') }}" alt=""> Tour</a>
                                </li>
                                <li><a href="{{ route('booking.flight') }}" class="waves-effect waves-light btn-large tourz-pop-ser-btn">
                                    <img src="{{ asset('assets/templates/images/icon/31.png') }}" alt=""> Flight</a>
                                </li>
                                <li><a href="{{ route('booking.car') }}" class="waves-effect waves-light btn-large tourz-pop-ser-btn">
                                    <img src="{{ asset('assets/templates/images/icon/30.png') }}" alt=""> Car Rentals</a>
                                </li>
                                <li><a href="{{ route('booking.hotel') }}" class="waves-effect waves-light btn-large tourz-pop-ser-btn">
                                    <img src="{{ asset('assets/templates/images/icon/1.png') }}" alt=""> Hotel</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Right Form -->
                <div class="col-md-6">
                    <div class="">
                        <form class="contact__form v2-search-form book-tab-form" method="post"
                              action="{{ route('booking.car.store') }}">
                            @csrf

                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <!-- User Info -->
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" name="name" placeholder="Enter your name"
                                           value="{{ auth()->user()?->name ?? old('name') }}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s6">
                                    <input type="number" name="phone" placeholder="Enter your phone"
                                           value="{{ auth()->user()?->phone ?? old('phone') }}" required>
                                </div>
                                <div class="input-field col s6">
                                    <input type="email" name="email" placeholder="Enter your email"
                                           value="{{ auth()->user()?->email ?? old('email') }}" required>
                                </div>
                            </div>

                            <!-- Pickup & Dropoff Locations (Text Input) -->
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" name="pickup_location" placeholder="Pick up location" required>
                                </div>
                                <div class="input-field col s12">
                                    <input type="text" name="dropoff_location" placeholder="Drop off location" required>
                                </div>
                            </div>

                            <!-- Dates & Times -->
                            <div class="row">
                                <div class="input-field col s6">
                                    <input type="date" name="pickup_date" placeholder="Pick up date" required>
                                </div>
                                <div class="input-field col s6">
                                    <input type="time" name="pickup_time" placeholder="Pick up time" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input type="date" name="dropoff_date" placeholder="Drop off date" required>
                                </div>
                                <div class="input-field col s6">
                                    <input type="time" name="dropoff_time" placeholder="Drop off time" required>
                                </div>
                            </div>

                            <!-- Car type & passengers -->
                            <div class="row">
                                <div class="input-field col s6">
                                    <select name="car_type" class="chosen-select" required>
                                        <option value="" disabled selected>Select car type</option>
                                        <option value="Micro">Micro</option>
                                        <option value="Mini">Mini</option>
                                        <option value="Prime">Prime</option>
                                        <option value="Prime SUV">Prime SUV</option>
                                        <option value="Luxury Cars">Luxury Cars</option>
                                        <option value="Mini Van">Mini Van</option>
                                        <option value="Small Bus">Small Bus</option>
                                        <option value="Luxury Bus">Luxury Bus</option>
                                    </select>
                                </div>
                                <div class="input-field col s6">
                                    <input type="number" name="total_passengers" placeholder="Total passengers" required>
                                </div>
                            </div>

                            <!-- Adults & Children -->
                            <div class="row">
                                <div class="input-field col s6">
                                    <input type="number" name="no_of_adults" placeholder="No of adults" required>
                                </div>
                                <div class="input-field col s6">
                                    <input type="number" name="no_of_childrens" placeholder="No of childrens">
                                </div>
                            </div>

                            <!-- Price -->
                            <div class="row">
                                <div class="input-field col s6">
                                    <input type="text" name="min_price" placeholder="Min Price">
                                </div>
                                <div class="input-field col s6">
                                    <input type="text" name="max_price" placeholder="Max Price">
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="submit" value="Book Now"
                                           class="waves-effect waves-light tourz-sear-btn v2-ser-btn">
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
