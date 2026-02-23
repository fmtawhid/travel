@extends('layouts.master')
@section('content')

<!--HEADER SECTION-->
<section>
    <div class="v2-hom-search">
        <div class="container">
            <div class="row">
                <!-- Left Banner / Info -->
                <div class="col-md-6">
                    <div class="v2-ho-se-ri">
                        <h5>World's leading tour and travels template</h5>
                        <h1>Hotel booking now!</h1>
                        <p>Experience the various exciting tour and travel packages and make hotel reservations, find vacation packages, search cheap hotels and events.</p>
                        <div class="ban-shrt-cut-link">
                            <ul>
                                <li>
                                    <a href="{{ route('booking.tour-package') }}" class="waves-effect waves-light btn-large tourz-pop-ser-btn">
                                        <img src="{{ asset('assets/templates/images/icon/2.png') }}" alt=""> Tour
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('booking.flight') }}" class="waves-effect waves-light btn-large tourz-pop-ser-btn">
                                        <img src="{{ asset('assets/templates/images/icon/31.png') }}" alt=""> Flight
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('booking.car') }}" class="waves-effect waves-light btn-large tourz-pop-ser-btn">
                                        <img src="{{ asset('assets/templates/images/icon/30.png') }}" alt=""> Car Rentals
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('booking.hotel') }}" class="waves-effect waves-light btn-large tourz-pop-ser-btn">
                                        <img src="{{ asset('assets/templates/images/icon/1.png') }}" alt=""> Hotel
                                    </a>
                                </li>								
                            </ul>
                        </div>
                    </div>						
                </div>	

                <!-- Booking Form -->
                <div class="col-md-6">
                    <div class="">
                        <form class="contact__form v2-search-form book-tab-form" method="POST" action="{{ route('booking.hotel.store') }}">
                            @csrf

                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul style="margin: 0; padding-left: 20px;">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Name -->
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" class="validate" name="name" placeholder="Enter your name" value="{{ old('name') ?? (Auth::check() ? Auth::user()->name : '') }}" required>
                                </div>
                            </div>

                            <!-- Phone & Email -->
                            <div class="row">
                                <div class="input-field col s6">
                                    <input type="number" class="validate" name="phone" placeholder="Enter your phone" value="{{ old('phone') ?? (Auth::check() ? Auth::user()->phone : '') }}" required>
                                </div>
                                <div class="input-field col s6">
                                    <input type="email" class="validate" name="email" placeholder="Enter your email" value="{{ old('email') ?? (Auth::check() ? Auth::user()->email : '') }}" required>
                                </div>
                            </div>

                            <!-- Select Hotel -->
                            <div class="row">
                                <div class="input-field col s12">
                                    <select name="hotel_id" class="chosen-select" id="hotel-select" required>
                                        <option value="" disabled selected>Select Hotel</option>
                                        @foreach($hotels as $hotel)
                                            <option value="{{ $hotel->id }}" 
                                                data-hotel-id="{{ $hotel->id }}"
                                                data-hotel-name="{{ $hotel->name }}"
                                                data-location="{{ $hotel->location }}"
                                                {{ (old('hotel_id') == $hotel->id || $selectedHotelId == $hotel->id) ? 'selected' : '' }}>
                                                {{ $hotel->name }} - {{ $hotel->location }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Hidden City Field (for compatibility) -->
                            <input type="hidden" name="city" id="city-hidden" value="{{ old('city') }}">
                            <!-- Hidden Room Type ID -->
                            <input type="hidden" name="room_type_id" id="room-type-hidden" value="{{ old('room_type_id') }}">

                            <!-- Checkin & Checkout -->
                            <div class="row">
                                <div class="input-field col s6">
                                    <input type="text" class="datepicker" name="checkin" placeholder="Check In" value="{{ old('checkin') }}" readonly required>
                                </div>
                                <div class="input-field col s6">
                                    <input type="text" class="datepicker" name="checkout" placeholder="Check Out" value="{{ old('checkout') }}" readonly required>
                                </div>
                            </div>

                            <!-- No of Rooms -->
                            <div class="row">
                                <div class="input-field col s12">
                                    <select class="chosen-select" name="noofrooms" required>
                                        <option value="" disabled selected>No of Rooms</option>
                                        @for($i=1;$i<=6;$i++)
                                            <option value="{{ $i }}" {{ old('noofrooms') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <!-- Adults & Children -->
                            <div class="row">
                                <div class="input-field col s6">
                                    <select class="chosen-select" name="noofadults" required>
                                        <option value="" disabled selected>No of adults</option>
                                        @for($i=1;$i<=6;$i++)
                                            <option value="{{ $i }}" {{ old('noofadults') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="input-field col s6">
                                    <select class="chosen-select" name="noofchildrens">
                                        <option value="" disabled selected>No of childrens</option>
                                        @for($i=0;$i<=6;$i++)
                                            <option value="{{ $i }}" {{ old('noofchildrens') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <!-- Min & Max Price -->
                            <div class="row">
                                <div class="input-field col s6">
                                    <input type="number" class="validate" name="minprice" placeholder="Min Price" value="{{ old('minprice') }}" min="0" step="0.01">
                                </div>
                                <div class="input-field col s6">
                                    <input type="number" class="validate" name="maxprice" placeholder="Max Price" value="{{ old('maxprice') }}" min="0" step="0.01">
                                </div>								
                            </div>								

                            <!-- Submit -->
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
<!--END HEADER SECTION-->
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Initialize datepicker with correct format
        $('.datepicker').pickadate({
            selectMonths: true,
            selectYears: true,
            format: 'yyyy-mm-dd',
            onSet: function(context) {
                // Handle the date selection
            }
        });

        // Create hotel rooms data structure from backend
        var hotelRooms = {
            @foreach($hotels as $hotel)
            {{ $hotel->id }}: [
                @foreach($hotel->roomTypes as $room)
                {
                    id: {{ $room->id }},
                    name: '{{ $room->room_type }}',
                    price: '{{ $room->price }}',
                    description: '{{ $room->description }}'
                },
                @endforeach
            ],
            @endforeach
        };

        // Handle hotel selection
        $('#hotel-select').on('change', function() {
            var hotelId = $(this).val();
            var hotelName = $(this).find('option:selected').data('hotel-name');
            var location = $(this).find('option:selected').data('location');
            
            // Update city field
            $('#city-hidden').val(location);
            
            // Set first room type as default or keep null
            if (hotelId && hotelRooms[hotelId] && hotelRooms[hotelId].length > 0) {
                $('#room-type-hidden').val(hotelRooms[hotelId][0].id);
            } else {
                $('#room-type-hidden').val('');
            }
            
            console.log('Hotel selected: ' + hotelName + ' (ID: ' + hotelId + ')');
            console.log('Available rooms:', hotelRooms[hotelId]);
        });

        // Pre-select hotel if there's old data or URL parameter
        @if(old('hotel_id'))
            $('#hotel-select').val({{ old('hotel_id') }}).trigger('change');
        @elseif($selectedHotelId)
            $('#hotel-select').val({{ $selectedHotelId }}).trigger('change');
        @endif
    });
</script>
@endpush
