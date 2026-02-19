@extends('layouts.admin')

@section('content')
<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active-bre"><a href="#">Car Bookings</a></li>
        </ul>
    </div>

    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>All Car Bookings</h4>
                    </div>

                    <div class="tab-inn">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Pickup</th>
                                        <th>Dropoff</th>
                                        <th>Pickup Date/Time</th>
                                        <th>Dropoff Date/Time</th>
                                        <th>Car Type</th>
                                        <th>Passengers</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->name }}</td>
                                        <td>{{ $booking->phone }}</td>
                                        <td>{{ $booking->email }}</td>
                                        <td>{{ $booking->pickup_location }}</td>
                                        <td>{{ $booking->dropoff_location }}</td>
                                        <td>{{ $booking->pickup_date->format('d M Y') }} {{ \Carbon\Carbon::parse($booking->pickup_time)->format('H:i') }}</td>
                                        <td>{{ $booking->dropoff_date->format('d M Y') }} {{ \Carbon\Carbon::parse($booking->dropoff_time)->format('H:i') }}</td>
                                        <td>{{ $booking->car_type }}</td>
                                        <td>{{ $booking->total_passengers }}</td>
                                        <td>
                                            <form action="{{ route('admin.booking-inquiries.car.destroy', $booking->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="10" class="text-center">No car bookings found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            {{ $bookings->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
