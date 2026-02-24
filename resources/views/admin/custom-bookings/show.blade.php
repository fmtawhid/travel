@extends('layouts.admin')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Custom Package Booking Details</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th width="30%">Name</th>
                                <td>{{ $customBooking->name }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $customBooking->phone }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $customBooking->email }}</td>
                            </tr>
                            <tr>
                                <th>City/Place</th>
                                <td>{{ $customBooking->city ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>No. of Travellers</th>
                                <td>{{ $customBooking->howmanytravellers ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Arrival Date</th>
                                <td>{{ $customBooking->arrival?->format('d M Y') ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Departure Date</th>
                                <td>{{ $customBooking->departure?->format('d M Y') ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>No. of Adults</th>
                                <td>{{ $customBooking->noofadults ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>No. of Childrens</th>
                                <td>{{ $customBooking->noofchildrens ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Budget Range</th>
                                <td>${{ $customBooking->minprice ?? 0 }} - ${{ $customBooking->maxprice ?? 0 }}</td>
                            </tr>
                            <tr>
                                <th>User</th>
                                <td>{{ $customBooking->user?->name ?? 'Guest' }}</td>
                            </tr>
                            <tr>
                                <th>Booking Date</th>
                                <td>{{ $customBooking->created_at->format('d M Y h:i A') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.custom-bookings.edit', $customBooking->id) }}" class="btn btn-warning">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('admin.custom-bookings.destroy', $customBooking->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>
                    <a href="{{ route('admin.custom-bookings.index') }}" class="btn btn-secondary">← Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
