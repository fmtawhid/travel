@extends('layouts.admin')

@section('content')
<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active-bre"><a href="#">Contact Inquiries</a></li>
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
                        <h4>All Contact Inquiries</h4>
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
                                        <th>Country</th>
                                        <th>Message</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->name }}</td>
                                        <td>{{ $booking->email }}</td>
                                        <td>{{ $booking->phone }}</td>
                                        <td>{{ $booking->city ?? '-' }}</td>
                                        <td>{{ $booking->country ?? '-' }}</td>
                                        <td>{{ Str::limit($booking->message, 50) ?? '-' }}</td>
                                        <td>
                                            <form action="{{ route('admin.booking-inquiries.other.destroy', $booking->id) }}" method="POST" style="display:inline;">
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
                                        <td colspan="7" class="text-center">No contact inquiries found</td>
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
