@extends('layouts.user')
@section('user_dashboard')

    <!--CENTER SECTION-->
    <div class="db-2">
        <div class="db-2-com db-2-main">
            <h4>Event Booking Details</h4>
            <div style="background: #fff; padding: 30px; border-radius: 5px;">
                <table class="db-detail-table">
                    <tr>
                        <td><strong>Event Name:</strong></td>
                        <td>{{ $booking?->event?->name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Event Date:</strong></td>
                        <td>{{ $booking?->event?->date ? \Carbon\Carbon::parse($booking->event->date)->format('d M Y') : 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Event Time:</strong></td>
                        <td>{{ $booking?->event?->time ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Event Location:</strong></td>
                        <td>{{ $booking?->event?->location ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Name:</strong></td>
                        <td>{{ $booking?->name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Phone:</strong></td>
                        <td>{{ $booking?->phone ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Email:</strong></td>
                        <td>{{ $booking?->email ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Note:</strong></td>
                        <td>{{ $booking?->note ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-top: 20px;">
                            <a href="{{ route('user.payment') }}" class="btn btn-primary" style="padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;">
                                Payment Method
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection