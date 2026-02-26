@extends('layouts.admin')

@section('content')
<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active-bre"><a href="#">Custom Bookings</a></li>
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
                        <h4>All Custom Bookings</h4>
                    </div>

                    <div class="tab-inn">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>City</th>
                                        <th>Arrival Date</th>
                                        <th>Departure Date</th>
                                        <th>Travellers</th>
                                        <th>Adults</th>
                                        <th>Children</th>
                                        <th>Budget (Min-Max)</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->name }}</td>
                                        <td>{{ $booking->email }}</td>
                                        <td>{{ $booking->phone }}</td>
                                        <td>{{ $booking->city }}</td>
                                        <td>{{ $booking->arrival?->format('d M Y') ?? '-' }}</td>
                                        <td>{{ $booking->departure?->format('d M Y') ?? '-' }}</td>
                                        <td>{{ $booking->howmanytravellers ?? '-' }}</td>
                                        <td>{{ $booking->noofadults ?? '-' }}</td>
                                        <td>{{ $booking->noofchildrens ?? '-' }}</td>
                                        <td>${{ $booking->minprice ?? '-' }} - ${{ $booking->maxprice ?? '-' }}</td>
                                        <td>
                                            <a href="{{ route('admin.payments.create', ['booking_type' => 'custom', 'booking_id' => $booking->id]) }}" 
                                               class="btn btn-sm btn-success" title="Make Payment">
                                                <i class="fa fa-credit-card"></i>
                                            </a>
                                            <form action="{{ route('admin.booking-inquiries.custom.destroy', $booking->id) }}" method="POST" style="display:inline;">
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
                                        <td colspan="11" class="text-center">No custom bookings found</td>
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
