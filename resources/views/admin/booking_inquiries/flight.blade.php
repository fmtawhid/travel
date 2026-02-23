@extends('layouts.admin')

@section('content')
<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active-bre"><a href="#">Flight Bookings</a></li>
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
                        <h4>All Flight Bookings</h4>
                    </div>

                    <div class="tab-inn">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Flying From</th>
                                        <th>Flying To</th>
                                        <th>Departure Date</th>
                                        <th>Arrival Date</th>
                                        <th>Adults</th>
                                        <th>Childrens</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($bookings as $booking)
                                    <tr>
                                        <td>{{ $loop->iteration + ($bookings->currentPage()-1)*$bookings->perPage() }}</td>
                                        <td>{{ $booking->user?->name ?? 'Guest' }}</td>
                                        <td>{{ $booking->name }}</td>
                                        <td>{{ $booking->phone }}</td>
                                        <td>{{ $booking->email }}</td>
                                        <td>{{ $booking->flying_from }}</td>
                                        <td>{{ $booking->flying_to }}</td>
                                        <td>{{ $booking->departure_date?->format('d M, Y') }}</td>
                                        <td>{{ $booking->arrival_date?->format('d M, Y') }}</td>
                                        <td>{{ $booking->no_of_adults }}</td>
                                        <td>{{ $booking->no_of_childrens }}</td>
                                        <td>
                                            <form action="{{ route('admin.booking-inquiries.flight.destroy', $booking->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure?')" style="border:none;background:none;color:red;">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="12" class="text-center">No flight bookings found</td>
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
