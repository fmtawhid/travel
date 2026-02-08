@extends('layouts.admin')

@section('content')
<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li>
                <a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Home</a>
            </li>
            <li>
                <a href="{{ route('admin.hotels.index') }}">Hotels</a>
            </li>
            <li class="active-bre">
                <a href="#">{{ $hotel->name }}</a>
            </li>
        </ul>
    </div>

    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-8">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>{{ $hotel->name }}</h4>
                        @if($hotel->location)
                            <p><i class="fa fa-map-marker"></i> {{ $hotel->location }}</p>
                        @endif
                    </div>

                    {{-- Hotel Image --}}
                    @if($hotel->image && file_exists(public_path('uploads/hotels/' . $hotel->image)))
                        <div style="margin-bottom: 20px;">
                            <img src="{{ asset('uploads/hotels/' . $hotel->image) }}" 
                                 style="max-width: 100%; height: auto; border-radius: 5px;">
                        </div>
                    @endif

                    {{-- Description --}}
                    @if($hotel->description)
                        <div style="margin: 20px 0; padding: 15px; background-color: #f9f9f9; border-left: 4px solid #007bff; border-radius: 3px;">
                            <h5>About</h5>
                            <p>{{ nl2br($hotel->description) }}</p>
                        </div>
                    @endif

                    {{-- Room Types --}}
                    @if($hotel->roomTypes && $hotel->roomTypes->count() > 0)
                        <div style="margin: 20px 0;">
                            <h5 style="border-bottom: 2px solid #007bff; padding-bottom: 10px;">Room Types</h5>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Room Type</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($hotel->roomTypes as $room)
                                        <tr>
                                            <td><strong>{{ $room->room_type }}</strong></td>
                                            <td>${{ number_format($room->price, 2) }}</td>
                                            <td>{{ $room->description ?? '-' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                </div>
            </div>

            <div class="col-md-4">
                {{-- Hotel Information --}}
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h5>Hotel Information</h5>
                    </div>

                    <div style="padding: 15px;">
                        @if($hotel->contact_person)
                            <p><strong>Contact Person:</strong> {{ $hotel->contact_person }}</p>
                        @endif

                        @if($hotel->phone)
                            <p>
                                <strong>Phone:</strong> 
                                <a href="tel:{{ $hotel->phone }}">{{ $hotel->phone }}</a>
                            </p>
                        @endif

                        @if($hotel->mobile)
                            <p>
                                <strong>Mobile:</strong> 
                                <a href="tel:{{ $hotel->mobile }}">{{ $hotel->mobile }}</a>
                            </p>
                        @endif

                        @if($hotel->email)
                            <p>
                                <strong>Email:</strong> 
                                <a href="mailto:{{ $hotel->email }}">{{ $hotel->email }}</a>
                            </p>
                        @endif

                        @if($hotel->whatsapp_number)
                            <p>
                                <strong>WhatsApp:</strong> 
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $hotel->whatsapp_number) }}" target="_blank">
                                    {{ $hotel->whatsapp_number }}
                                </a>
                            </p>
                        @endif
                    </div>
                </div>

                {{-- Social Media --}}
                @if($hotel->facebook_url || $hotel->twitter_url || $hotel->linkedin_url)
                    <div class="box-inn-sp" style="margin-top: 20px;">
                        <div class="inn-title">
                            <h5>Social Media</h5>
                        </div>

                        <div style="padding: 15px;">
                            @if($hotel->facebook_url)
                                <p>
                                    <a href="{{ $hotel->facebook_url }}" target="_blank" style="color: #1877f2;">
                                        <i class="fa fa-facebook"></i> Facebook
                                    </a>
                                </p>
                            @endif

                            @if($hotel->twitter_url)
                                <p>
                                    <a href="{{ $hotel->twitter_url }}" target="_blank" style="color: #1da1f2;">
                                        <i class="fa fa-twitter"></i> Twitter
                                    </a>
                                </p>
                            @endif

                            @if($hotel->linkedin_url)
                                <p>
                                    <a href="{{ $hotel->linkedin_url }}" target="_blank" style="color: #0a66c2;">
                                        <i class="fa fa-linkedin"></i> LinkedIn
                                    </a>
                                </p>
                            @endif
                        </div>
                    </div>
                @endif

                {{-- Action Buttons --}}
                <div class="box-inn-sp" style="margin-top: 20px;">
                    <div style="padding: 15px;">
                        <a href="{{ route('admin.hotels.edit', $hotel->id) }}" 
                           class="btn btn-warning btn-block" style="margin-bottom: 10px;">
                            <i class="fa fa-pencil"></i> Edit Hotel
                        </a>
                        <form action="{{ route('admin.hotels.destroy', $hotel->id) }}" 
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this hotel?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block">
                                <i class="fa fa-trash"></i> Delete Hotel
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
