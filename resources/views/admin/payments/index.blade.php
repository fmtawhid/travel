@extends('layouts.admin')

@section('content')
<div class="sb2-2">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>Payments Management
                            <a href="{{ route('admin.payments.create') }}" class="btn-small waves-effect waves-light right">
                                <i class="fa fa-plus"></i> Add New Payment
                            </a>
                        </h4>
                    </div>

                    <div class="tab-inn">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Booking Type</th>
                                        <th>Reference</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Description</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($payments as $payment)
                                    <tr>
                                        <td><strong>#{{ $payment->id }}</strong></td>
                                        <td>
                                            <span class="">{{ $payment->getBookingType() }}</span>
                                        </td>
                                        <td>
                                            @if($payment->tour_booking_id)
                                                Tour #{{ $payment->tour_booking_id }}
                                            @elseif($payment->hotel_booking_id)
                                                Hotel #{{ $payment->hotel_booking_id }}
                                            @elseif($payment->car_booking_id)
                                                Car #{{ $payment->car_booking_id }}
                                            @elseif($payment->flight_booking_id)
                                                Flight #{{ $payment->flight_booking_id }}
                                            @elseif($payment->custom_booking_id)
                                                Custom #{{ $payment->custom_booking_id }}
                                            @endif
                                        </td>
                                        <td><strong>${{ number_format($payment->amount, 2) }}</strong></td>
                                        <td>
                                            @if($payment->status == 'pending')
                                                <span class="text-warning">Pending</span>
                                            @elseif($payment->status == 'completed')
                                                <span class="text-success">Completed</span>
                                            @elseif($payment->status == 'failed')
                                                <span class="text-danger">Failed</span>
                                            @elseif($payment->status == 'cancelled')
                                                <span class="text-secondary">Cancelled</span>
                                            @endif
                                        </td>
                                        <td><small>{{ Str::limit($payment->description, 25) }}</small></td>
                                        <td><small>{{ $payment->created_at->format('d M Y') }}</small></td>
                                        <td>
                                            <a href="{{ route('admin.payments.show', $payment->id) }}" title="View" style="border:none;background:none;color:blue;">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.payments.edit', $payment->id) }}" title="Edit" style="border:none;background:none;color:orange;">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.payments.destroy', $payment->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="Delete" style="border:none;background:none;color:red;">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No payments found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            {{ $payments->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
