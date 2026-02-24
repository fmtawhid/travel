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
                        <h1>Book Your Event Now!</h1>
                        <p>Register for amazing events worldwide. Join thousands of event attendees and create unforgettable memories.</p>
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

                <!-- Booking Form -->
                <div class="col-md-6">
                    <div class="">
                        <form class="contact__form v2-search-form book-tab-form" method="POST" action="{{ route('booking.event.store') }}">
                            @csrf

                            {{-- Event ID Hidden Field --}}
                            @if($event)
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                            @endif

                            {{-- Success --}}
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            {{-- Errors --}}
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif

                            {{-- Event Info --}}
                            @if($event)
                                <div class="alert alert-info">
                                    <strong>Event:</strong> {{ $event->name }}<br>
                                    <strong>Date:</strong> {{ $event->date ? \Carbon\Carbon::parse($event->date)->format('d M Y') : 'N/A' }}<br>
                                    <strong>Time:</strong> {{ $event->time ?? 'N/A' }}<br>
                                    <strong>Location:</strong> {{ $event->location ?? 'N/A' }}
                                </div>
                            @endif

                            <!-- Name -->
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" class="validate" name="name" placeholder="Enter your name" value="{{ auth()->user()?->name ?? old('name') }}" required>
                                </div>
                            </div>

                            <!-- Phone & Email -->
                            <div class="row">
                                <div class="input-field col s6">
                                    <input type="number" class="validate" name="phone" placeholder="Enter your phone" value="{{ auth()->user()?->phone ?? old('phone') }}" required>
                                </div>
                                <div class="input-field col s6">
                                    <input type="email" class="validate" name="email" placeholder="Enter your email" value="{{ auth()->user()?->email ?? old('email') }}" required>
                                </div>
                            </div>

                            <!-- Note -->
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea name="note" class="materialize-textarea" placeholder="Any special requests or questions?">{{ old('note') }}</textarea>
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="submit" value="Book Event" class="waves-effect waves-light tourz-sear-btn v2-ser-btn">
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
