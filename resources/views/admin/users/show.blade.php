@extends('layouts.admin')

@section('content')

<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-home"></i> Dashboard
                </a>
            </li>
            <li class="active-bre">
                <a href="#">User Profile</a>
            </li>
        </ul>
    </div>

    <div class="sb2-2-3">
        <!-- Profile Card Header -->
        <div class="box-inn-sp" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; border-radius: 8px; margin-bottom: 20px;">
            <div class="row" style="margin-bottom: 0;">
                <div class="col s12 m3" style="text-align: center; padding: 20px;">
                    <img src="{{ $user->image ? asset('uploads/users/' . $user->image) : asset('assets/admin/images/user/1.png') }}" alt="{{ $user->first_name }}" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 3px solid rgba(255,255,255,0.3);">
                </div>
                <div class="col s12 m9" style="padding: 20px;">
                    <h2 style="margin: 0 0 10px 0;">{{ $user->first_name }} {{ $user->last_name }}</h2>
                    <p style="margin: 5px 0; font-size: 16px;"><i class="fa fa-envelope" style="margin-right: 10px;"></i>{{ $user->email }}</p>
                    <p style="margin: 5px 0; font-size: 16px;"><i class="fa fa-phone" style="margin-right: 10px;"></i>{{ $user->phone ?? 'N/A' }}</p>
                    <p style="margin: 5px 0; font-size: 16px;"><i class="fa fa-map-marker" style="margin-right: 10px;"></i>{{ $user->city }}, {{ $user->country }}</p>
                    <div style="margin-top: 15px;">
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn" style="background: white; color: #667eea; border-radius: 4px; padding: 0px 20px; text-decoration: none; display: inline-block; font-weight: 500;">
                            <i class="fa fa-edit"></i> Edit Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 15px; margin-bottom: 20px;">
            <div class="box-inn-sp" style="text-align: center; padding: 20px;">
                <div style="font-size: 28px; color: #007bff; font-weight: bold;">{{ $user->tourBookings->count() }}</div>
                <div style="color: #666; margin-top: 5px; font-size: 14px;">Tour Bookings</div>
            </div>
            <div class="box-inn-sp" style="text-align: center; padding: 20px;">
                <div style="font-size: 28px; color: #28a745; font-weight: bold;">{{ $user->hotelBookings->count() }}</div>
                <div style="color: #666; margin-top: 5px; font-size: 14px;">Hotel Bookings</div>
            </div>
            <div class="box-inn-sp" style="text-align: center; padding: 20px;">
                <div style="font-size: 28px; color: #ffc107; font-weight: bold;">{{ $user->carBookings->count() }}</div>
                <div style="color: #666; margin-top: 5px; font-size: 14px;">Car Bookings</div>
            </div>
            <div class="box-inn-sp" style="text-align: center; padding: 20px;">
                <div style="font-size: 28px; color: #17a2b8; font-weight: bold;">{{ $user->flightBookings->count() }}</div>
                <div style="color: #666; margin-top: 5px; font-size: 14px;">Flight Bookings</div>
            </div>
            <div class="box-inn-sp" style="text-align: center; padding: 20px;">
                <div style="font-size: 28px; color: #dc3545; font-weight: bold;">{{ $user->customBookings->count() }}</div>
                <div style="color: #666; margin-top: 5px; font-size: 14px;">Custom Bookings</div>
            </div>
            <div class="box-inn-sp" style="text-align: center; padding: 20px;">
                <div style="font-size: 28px; color: #6f42c1; font-weight: bold;">{{ $user->eventBookings->count() }}</div>
                <div style="color: #666; margin-top: 5px; font-size: 14px;">Event Bookings</div>
            </div>
        </div>

        <!-- Personal Information Section -->
        <div class="box-inn-sp" style="margin-bottom: 20px;">
            <div class="inn-title">
                <h4><i class="fa fa-user" style="margin-right: 10px;"></i>Personal Information</h4>
            </div>
            <div style="padding: 20px;">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                    <div>
                        <label style="color: #999; font-size: 12px; text-transform: uppercase; font-weight: bold;">First Name</label>
                        <p style="font-size: 16px; color: #333; margin: 5px 0;">{{ $user->first_name }}</p>
                    </div>
                    <div>
                        <label style="color: #999; font-size: 12px; text-transform: uppercase; font-weight: bold;">Last Name</label>
                        <p style="font-size: 16px; color: #333; margin: 5px 0;">{{ $user->last_name }}</p>
                    </div>
                    <div>
                        <label style="color: #999; font-size: 12px; text-transform: uppercase; font-weight: bold;">Email</label>
                        <p style="font-size: 16px; color: #333; margin: 5px 0;">{{ $user->email }}</p>
                    </div>
                    <div>
                        <label style="color: #999; font-size: 12px; text-transform: uppercase; font-weight: bold;">Phone</label>
                        <p style="font-size: 16px; color: #333; margin: 5px 0;">{{ $user->phone ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <label style="color: #999; font-size: 12px; text-transform: uppercase; font-weight: bold;">City</label>
                        <p style="font-size: 16px; color: #333; margin: 5px 0;">{{ $user->city ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <label style="color: #999; font-size: 12px; text-transform: uppercase; font-weight: bold;">Country</label>
                        <p style="font-size: 16px; color: #333; margin: 5px 0;">{{ $user->country ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Tour Bookings -->
        @if($user->tourBookings->count() > 0)
        <div class="box-inn-sp" style="margin-bottom: 20px;">
            <div class="inn-title">
                <h4><i class="fa fa-map" style="margin-right: 10px; color: #007bff;"></i>Tour Bookings</h4>
            </div>
            <div style="overflow-x: auto;">
                <table style="width: 100%; text-align: left; border-collapse: collapse;">
                    <thead>
                        <tr style="border-bottom: 2px solid #f0f0f0;">
                            <th style="padding: 12px; text-transform: uppercase; font-size: 12px; color: #999; font-weight: bold;">Tour</th>
                            <th style="padding: 12px; text-transform: uppercase; font-size: 12px; color: #999; font-weight: bold;">Start Date</th>
                            <th style="padding: 12px; text-transform: uppercase; font-size: 12px; color: #999; font-weight: bold;">Price</th>
                            <th style="padding: 12px; text-transform: uppercase; font-size: 12px; color: #999; font-weight: bold;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($user->tourBookings->take(5) as $booking)
                        <tr style="border-bottom: 1px solid #f0f0f0;">
                            <td style="padding: 12px;">{{ $booking->tour->title ?? 'N/A' }}</td>
                            <td style="padding: 12px;">{{ $booking->start_date ?? 'N/A' }}</td>
                            <td style="padding: 12px; font-weight: bold;">{{ $booking->total_price ? '$' . $booking->total_price : 'N/A' }}</td>
                            <td style="padding: 12px;"><span class="badge" style="background: #007bff; color: white; padding: 0px 8px; border-radius: 3px; font-size: 12px;">{{ $booking->status ?? 'pending' }}</span></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="padding: 12px; text-align: center; color: #999;">No tour bookings</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        <!-- Recent Hotel Bookings -->
        @if($user->hotelBookings->count() > 0)
        <div class="box-inn-sp" style="margin-bottom: 20px;">
            <div class="inn-title">
                <h4><i class="fa fa-building" style="margin-right: 10px; color: #28a745;"></i>Hotel Bookings</h4>
            </div>
            <div style="overflow-x: auto;">
                <table style="width: 100%; text-align: left; border-collapse: collapse;">
                    <thead>
                        <tr style="border-bottom: 2px solid #f0f0f0;">
                            <th style="padding: 12px; text-transform: uppercase; font-size: 12px; color: #999; font-weight: bold;">Hotel</th>
                            <th style="padding: 12px; text-transform: uppercase; font-size: 12px; color: #999; font-weight: bold;">Check-in</th>
                            <th style="padding: 12px; text-transform: uppercase; font-size: 12px; color: #999; font-weight: bold;">Check-out</th>
                            <th style="padding: 12px; text-transform: uppercase; font-size: 12px; color: #999; font-weight: bold;">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($user->hotelBookings->take(5) as $booking)
                        <tr style="border-bottom: 1px solid #f0f0f0;">
                            <td style="padding: 12px;">{{ $booking->hotel->name ?? 'N/A' }}</td>
                            <td style="padding: 12px;">{{ $booking->check_in_date ?? 'N/A' }}</td>
                            <td style="padding: 12px;">{{ $booking->check_out_date ?? 'N/A' }}</td>
                            <td style="padding: 12px; font-weight: bold;">{{ $booking->total_price ? '$' . $booking->total_price : 'N/A' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="padding: 12px; text-align: center; color: #999;">No hotel bookings</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        <!-- Car Bookings -->
        @if($user->carBookings->count() > 0)
        <div class="box-inn-sp" style="margin-bottom: 20px;">
            <div class="inn-title">
                <h4><i class="fa fa-car" style="margin-right: 10px; color: #ffc107;"></i>Car Bookings</h4>
            </div>
            <div style="overflow-x: auto;">
                <table style="width: 100%; text-align: left; border-collapse: collapse;">
                    <thead>
                        <tr style="border-bottom: 2px solid #f0f0f0;">
                            <th style="padding: 12px; text-transform: uppercase; font-size: 12px; color: #999; font-weight: bold;">Pickup Location</th>
                            <th style="padding: 12px; text-transform: uppercase; font-size: 12px; color: #999; font-weight: bold;">Pickup Date</th>
                            <th style="padding: 12px; text-transform: uppercase; font-size: 12px; color: #999; font-weight: bold;">Price</th>
                            <th style="padding: 12px; text-transform: uppercase; font-size: 12px; color: #999; font-weight: bold;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($user->carBookings->take(5) as $booking)
                        <tr style="border-bottom: 1px solid #f0f0f0;">
                            <td style="padding: 12px;">{{ $booking->pickup_location ?? 'N/A' }}</td>
                            <td style="padding: 12px;">{{ $booking->pickup_date ?? 'N/A' }}</td>
                            <td style="padding: 12px; font-weight: bold;">{{ $booking->total_price ? '$' . $booking->total_price : 'N/A' }}</td>
                            <td style="padding: 12px;"><span class="badge" style="background: #ffc107; color: #333; padding: 0px 8px; border-radius: 3px; font-size: 12px;">{{ $booking->status ?? 'pending' }}</span></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="padding: 12px; text-align: center; color: #999;">No car bookings</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        <!-- Flight Bookings -->
        @if($user->flightBookings->count() > 0)
        <div class="box-inn-sp" style="margin-bottom: 20px;">
            <div class="inn-title">
                <h4><i class="fa fa-plane" style="margin-right: 10px; color: #17a2b8;"></i>Flight Bookings</h4>
            </div>
            <div style="overflow-x: auto;">
                <table style="width: 100%; text-align: left; border-collapse: collapse;">
                    <thead>
                        <tr style="border-bottom: 2px solid #f0f0f0;">
                            <th style="padding: 12px; text-transform: uppercase; font-size: 12px; color: #999; font-weight: bold;">Route</th>
                            <th style="padding: 12px; text-transform: uppercase; font-size: 12px; color: #999; font-weight: bold;">Passengers</th>
                            <th style="padding: 12px; text-transform: uppercase; font-size: 12px; color: #999; font-weight: bold;">Price</th>
                            <th style="padding: 12px; text-transform: uppercase; font-size: 12px; color: #999; font-weight: bold;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($user->flightBookings->take(5) as $booking)
                        <tr style="border-bottom: 1px solid #f0f0f0;">
                            <td style="padding: 12px;">{{ $booking->route ?? 'N/A' }}</td>
                            <td style="padding: 12px;">{{ $booking->passenger_count ?? 'N/A' }}</td>
                            <td style="padding: 12px; font-weight: bold;">{{ $booking->total_price ? '$' . $booking->total_price : 'N/A' }}</td>
                            <td style="padding: 12px;"><span class="badge" style="background: #17a2b8; color: white; padding: 0px 8px; border-radius: 3px; font-size: 12px;">{{ $booking->status ?? 'pending' }}</span></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="padding: 12px; text-align: center; color: #999;">No flight bookings</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        <!-- Custom Bookings -->
        @if($user->customBookings->count() > 0)
        <div class="box-inn-sp" style="margin-bottom: 20px;">
            <div class="inn-title">
                <h4><i class="fa fa-suitcase" style="margin-right: 10px; color: #dc3545;"></i>Custom Bookings</h4>
            </div>
            <div style="overflow-x: auto;">
                <table style="width: 100%; text-align: left; border-collapse: collapse;">
                    <thead>
                        <tr style="border-bottom: 2px solid #f0f0f0;">
                            <th style="padding: 12px; text-transform: uppercase; font-size: 12px; color: #999; font-weight: bold;">Destination</th>
                            <th style="padding: 12px; text-transform: uppercase; font-size: 12px; color: #999; font-weight: bold;">Travelers</th>
                            <th style="padding: 12px; text-transform: uppercase; font-size: 12px; color: #999; font-weight: bold;">Price</th>
                            <th style="padding: 12px; text-transform: uppercase; font-size: 12px; color: #999; font-weight: bold;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($user->customBookings->take(5) as $booking)
                        <tr style="border-bottom: 1px solid #f0f0f0;">
                            <td style="padding: 12px;">{{ $booking->destination ?? 'N/A' }}</td>
                            <td style="padding: 12px;">{{ $booking->traveler_count ?? 'N/A' }}</td>
                            <td style="padding: 12px; font-weight: bold;">{{ $booking->total_price ? '$' . $booking->total_price : 'N/A' }}</td>
                            <td style="padding: 12px;"><span class="badge" style="background: #dc3545; color: white; padding: 0px 8px; border-radius: 3px; font-size: 12px;">{{ $booking->status ?? 'pending' }}</span></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="padding: 12px; text-align: center; color: #999;">No custom bookings</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        <!-- Event Bookings -->
        @if($user->eventBookings->count() > 0)
        <div class="box-inn-sp" style="margin-bottom: 20px;">
            <div class="inn-title">
                <h4><i class="fa fa-calendar" style="margin-right: 10px; color: #6f42c1;"></i>Event Bookings</h4>
            </div>
            <div style="overflow-x: auto;">
                <table style="width: 100%; text-align: left; border-collapse: collapse;">
                    <thead>
                        <tr style="border-bottom: 2px solid #f0f0f0;">
                            <th style="padding: 12px; text-transform: uppercase; font-size: 12px; color: #999; font-weight: bold;">Event</th>
                            <th style="padding: 12px; text-transform: uppercase; font-size: 12px; color: #999; font-weight: bold;">Date</th>
                            <th style="padding: 12px; text-transform: uppercase; font-size: 12px; color: #999; font-weight: bold;">Attendees</th>
                            <th style="padding: 12px; text-transform: uppercase; font-size: 12px; color: #999; font-weight: bold;">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($user->eventBookings->take(5) as $booking)
                        <tr style="border-bottom: 1px solid #f0f0f0;">
                            <td style="padding: 12px;">{{ $booking->event->name ?? 'N/A' }}</td>
                            <td style="padding: 12px;">{{ $booking->event_date ?? 'N/A' }}</td>
                            <td style="padding: 12px;">{{ $booking->number_of_attendees ?? 'N/A' }}</td>
                            <td style="padding: 12px; font-weight: bold;">{{ $booking->total_price ? '$' . $booking->total_price : 'N/A' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="padding: 12px; text-align: center; color: #999;">No event bookings</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
</div>

<style>
    .badge {
        display: inline-block;
    }
</style>

@endsection