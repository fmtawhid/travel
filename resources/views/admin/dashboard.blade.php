@extends('layouts.admin')
@section('content')

            <!--== BODY INNER CONTAINER ==-->
            <div class="sb2-2">
                <!--== breadcrumbs ==-->
                <div class="sb2-2-2">
                    <ul>
                        <li><a href="index.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                        <li class="active-bre"><a href="#"> Dashboard</a>
                        </li>
                        <li class="page-back"><a href="index.html"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
                        </li>
                    </ul>
                </div>
                <!--== DASHBOARD INFO ==-->
                <div class="ad-v2-hom-info">
					<div class="ad-v2-hom-info-inn">
						<ul>
							
							<li>
								<div class="ad-hom-box ad-hom-box-2">
									<span class="ad-hom-col-com ad-hom-col-2"><i class="fa fa-usd"></i></span>
									<div class="ad-hom-view-com">
									<p><i class="fa  fa-arrow-up up"></i> Earnings</p>
									<h3>${{ number_format($paidAmount, 2) }}</h3>
									</div>
								</div>
							</li>
                            <li>
								<div class="ad-hom-box ad-hom-box-1">
									<span class="ad-hom-col-com ad-hom-col-1"><i class="fa fa-bar-chart"></i></span>
									<div class="ad-hom-view-com">
									<p><i class="fa  fa-arrow-up up"></i> Due Amount</p>
									<h3>${{ number_format($pendingAmount, 2) }}</h3>
									</div>
								</div>
							</li>
							<li>
								<div class="ad-hom-box ad-hom-box-3">
									<span class="ad-hom-col-com ad-hom-col-3"><i class="fa fa-address-card-o"></i></span>
									<div class="ad-hom-view-com">
									<p><i class="fa  fa-arrow-up up"></i> Users</p>
									<h3>{{ $user }}</h3>
									</div>
								</div>
							</li>
							<li>
								<div class="ad-hom-box ad-hom-box-4">
									<span class="ad-hom-col-com ad-hom-col-4"><i class="fa fa-envelope-open-o"></i></span>
									<div class="ad-hom-view-com">
									<p><i class="fa  fa-arrow-up up"></i> Enquiry</p>
									<h3>{{ $totalenquiries }}</h3>
									</div>
								</div>
							</li>
						</ul>
					</div>
                </div>
                <div class="sb2-2-3">
                    <div class="row">
                        <!--== Paid Payment ==-->
                        <div class="col-md-6">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Paid Payment</h4>
                                    <p>Completed payments from users</p>
                                    <a class='dropdown-button drop-down-meta' href='#' data-activates='dropdown1'><i class="material-icons">more_vert</i></a>
                                    <!-- Dropdown Structure -->
                                    <ul id='dropdown1' class='dropdown-content'>
                                        <li><a href="{{ route('admin.payments.index') }}">View All</a>
                                        </li>
                                        <li><a href="{{ route('admin.payments.index') }}"><i class="material-icons">download</i>Download</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Payment ID</th>
                                                    <th>Customer</th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($completedPayments as $payment)
                                                <tr>
                                                    <td><span class="txt-dark weight-500">#{{ $payment->id }}</span></td>
                                                    <td>{{ $payment->getUser()?->name ?? 'N/A' }}</td>
                                                    <td>
                                                        <span class="txt-dark weight-500">${{ number_format($payment->amount, 2) }}</span>
                                                    </td>
                                                    <td>{{ $payment->created_at->format('M d, Y') }}</td>
                                                    <td>
                                                        <span class="label label-success">Completed</span>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">No completed payments</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--== Due Payment ==-->
                        <div class="col-md-6">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Due Payment</h4>
                                    <p>Pending and processing payments</p>
                                    <a class='dropdown-button drop-down-meta' href='#' data-activates='dropdown2'><i class="material-icons">more_vert</i></a>
                                    <!-- Dropdown Structure -->
                                    <ul id='dropdown2' class='dropdown-content'>
                                        <li><a href="{{ route('admin.payments.request') }}">View All</a>
                                        </li>
                                        <li><a href="{{ route('admin.payments.request') }}"><i class="material-icons">download</i>Download</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Payment ID</th>
                                                    <th>Customer</th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($pendingPayments as $payment)
                                                <tr>
                                                    <td><span class="txt-dark weight-500">#{{ $payment->id }}</span></td>
                                                    <td>{{ $payment->getUser()?->name ?? 'N/A' }}</td>
                                                    <td>
                                                        <span class="txt-dark weight-500">${{ number_format($payment->amount, 2) }}</span>
                                                    </td>
                                                    <td>{{ $payment->created_at->format('M d, Y') }}</td>
                                                    <td>
                                                        @if($payment->status === 'completed')
                                                        <span class="label label-success">Completed</span>
                                                        @elseif($payment->status === 'pending')
                                                        <span class="label label-warning">Pending</span>
                                                        @elseif($payment->status === 'processing')
                                                        <span class="label label-info">Processing</span>
                                                        @else
                                                        <span class="label label-default">{{ ucfirst($payment->status) }}</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">No pending payments</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--== User Details ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>User Details</h4>
                                    <p>Airtport Hotels The Right Way To Start A Short Break Holiday</p>
                                    <a class="dropdown-button drop-down-meta" href="#" data-activates="dr-users"><i class="material-icons">more_vert</i></a>
                                    <ul id="dr-users" class="dropdown-content">
                                        <li><a href="#!">Add New</a>
                                        </li>
                                        <li><a href="#!">Edit</a>
                                        </li>
                                        <li><a href="#!">Update</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#!"><i class="material-icons">delete</i>Delete</a>
                                        </li>
                                        <li><a href="#!"><i class="material-icons">subject</i>View All</a>
                                        </li>
                                        <li><a href="#!"><i class="material-icons">play_for_work</i>Download</a>
                                        </li>
                                    </ul>
                                    <!-- Dropdown Structure -->

                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>User</th>
                                                    <th>Name</th>
                                                    <th>Phone</th>
                                                    <th>Email</th>
                                                    <th>Country</th>
                                                    <th>Listings</th>
                                                    <th>Enquiry</th>
                                                    <th>Bookings</th>
                                                    <th>Reviews</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($users as $user)
                                                <tr>
                                                    <td><span class="list-img"><span style="background: #e0e0e0; display: inline-block; width: 40px; height: 40px; border-radius: 50%; text-align: center; line-height: 40px; color: #666; font-weight: bold;">{{ strtoupper(substr($user->name, 0, 1)) }}</span></span>
                                                    </td>
                                                    <td><a href="#"><span class="list-enq-name">{{ $user->name }}</span><span class="list-enq-city">{{ $user->city ?? 'N/A' }}</span></a>
                                                    </td>
                                                    <td>{{ $user->phone ?? 'N/A' }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->country ?? 'N/A' }}</td>
                                                    <td>
                                                        <span class="label label-primary">{{ $user->tour_bookings_count + $user->hotel_bookings_count + $user->car_bookings_count + $user->flight_bookings_count + $user->custom_bookings_count }}</span>
                                                    </td>
                                                    <td>
                                                        <span class="label label-danger">{{ $user->tour_bookings_count }}</span>
                                                    </td>
                                                    <td>
                                                        <span class="label label-success">{{ $user->hotel_bookings_count }}</span>
                                                    </td>
                                                    <td>
                                                        <span class="label label-info">{{ $user->reviews_count }}</span>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="9" class="text-center">No users found</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- ============== ENQUIRY SECTION ============== -->
                <!-- Row 1: Tour & Hotel Enquiries -->
                <div class="sb2-2-3">
                    <div class="row">
                        <!--== Tour Enquiry ==-->
                        <div class="col-md-6">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Tour Enquiry</h4>
                                    <p>Tour booking enquiries and requests</p>
                                    <a class="dropdown-button drop-down-meta" href="#" data-activates="dr-tour"><i class="material-icons">more_vert</i></a>
                                    <ul id="dr-tour" class="dropdown-content">
                                        <li><a href="{{ route('admin.booking-inquiries.tour-package') }}"><i class="material-icons">visibility</i>View All</a></li>
                                    </ul>
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Select</th>
                                                    <th>Package</th>
                                                    <th>Customer</th>
                                                    <th>Date</th>
                                                    <th>Location</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($tourBookingsEnquiry as $idx => $booking)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" class="filled-in" id="tour-{{ $idx }}" />
                                                        <label for="tour-{{ $idx }}"></label>
                                                    </td>
                                                    <td><span class="list-img" style="background: #007bff; display: inline-block; width: 40px; height: 40px; border-radius: 4px; text-align: center; line-height: 40px; color: white; font-weight: bold;">{{ strtoupper(substr($booking->tour->title ?? 'T', 0, 1)) }}</span></td>
                                                    <td><span class="list-enq-name">{{ $booking->tour->title ?? 'N/A' }}</span><span class="list-enq-city">{{ $booking->user->name ?? 'N/A' }}</span></td>
                                                    <td>{{ $booking->created_at->format('d M Y') }}</td>
                                                    <td>{{ $booking->tour->location ?? 'N/A' }}</td>
                                                </tr>
                                                @empty
                                                <tr><td colspan="5" class="text-center">No tour enquiries</td></tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--== Hotel Enquiry ==-->
                        <div class="col-md-6">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Hotel Enquiry</h4>
                                    <p>Hotel booking enquiries and requests</p>
                                    <a class="dropdown-button drop-down-meta" href="#" data-activates="dr-hotel"><i class="material-icons">more_vert</i></a>
                                    <ul id="dr-hotel" class="dropdown-content">
                                        <li><a href="{{ route('admin.booking-inquiries.hotel') }}"><i class="material-icons">visibility</i>View All</a></li>
                                    </ul>
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Select</th>
                                                    <th>Hotel</th>
                                                    <th>Customer</th>
                                                    <th>Check-in</th>
                                                    <th>Rooms</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($hotelBookingsEnquiry as $idx => $booking)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" id="hotel-{{ $idx }}" />
                                                        <label for="hotel-{{ $idx }}"></label>
                                                    </td>
                                                    <td><span class="list-img" style="background: #28a745; display: inline-block; width: 40px; height: 40px; border-radius: 4px; text-align: center; line-height: 40px; color: white; font-weight: bold;">{{ strtoupper(substr($booking->hotel->name ?? 'H', 0, 1)) }}</span></td>
                                                    <td><span class="list-enq-name">{{ $booking->hotel->name ?? 'N/A' }}</span><span class="list-enq-city">{{ $booking->user->name ?? 'N/A' }}</span></td>
                                                    <td>{{ $booking->check_in->format('d M Y') }}</td>
                                                    <td><span class="label label-success">{{ $booking->no_of_rooms }}</span></td>
                                                </tr>
                                                @empty
                                                <tr><td colspan="5" class="text-center">No hotel enquiries</td></tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row 2: Car & Flight Enquiries -->
                <div class="sb2-2-3">
                    <div class="row">
                        <!--== Car Enquiry ==-->
                        <div class="col-md-6">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Car Enquiry</h4>
                                    <p>Car rental booking enquiries</p>
                                    <a class="dropdown-button drop-down-meta" href="#" data-activates="dr-car"><i class="material-icons">more_vert</i></a>
                                    <ul id="dr-car" class="dropdown-content">
                                        <li><a href="{{ route('admin.booking-inquiries.car') }}"><i class="material-icons">visibility</i>View All</a></li>
                                    </ul>
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Select</th>
                                                    <th>Type</th>
                                                    <th>Customer</th>
                                                    <th>Pickup</th>
                                                    <th>Passengers</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($carBookingsEnquiry as $idx => $booking)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" id="car-{{ $idx }}" />
                                                        <label for="car-{{ $idx }}"></label>
                                                    </td>
                                                    <td><span class="list-img" style="background: #ffc107; display: inline-block; width: 40px; height: 40px; border-radius: 4px; text-align: center; line-height: 40px; color: white; font-weight: bold;">{{ strtoupper(substr($booking->car_type ?? 'C', 0, 1)) }}</span></td>
                                                    <td><span class="list-enq-name">{{ $booking->car_type ?? 'N/A' }}</span><span class="list-enq-city">{{ $booking->user->name ?? 'N/A' }}</span></td>
                                                    <td>{{ $booking->pickup_date->format('d M Y') }}</td>
                                                    <td><span class="label label-info">{{ $booking->total_passengers }}</span></td>
                                                </tr>
                                                @empty
                                                <tr><td colspan="5" class="text-center">No car enquiries</td></tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--== Flight Enquiry ==-->
                        <div class="col-md-6">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Flight Enquiry</h4>
                                    <p>Flight booking enquiries and requests</p>
                                    <a class="dropdown-button drop-down-meta" href="#" data-activates="dr-flight"><i class="material-icons">more_vert</i></a>
                                    <ul id="dr-flight" class="dropdown-content">
                                        <li><a href="{{ route('admin.booking-inquiries.flight') }}"><i class="material-icons">visibility</i>View All</a></li>
                                    </ul>
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Select</th>
                                                    <th>Route</th>
                                                    <th>Customer</th>
                                                    <th>Date</th>
                                                    <th>Passengers</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($flightBookingsEnquiry as $idx => $booking)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" id="flight-{{ $idx }}" />
                                                        <label for="flight-{{ $idx }}"></label>
                                                    </td>
                                                    <td><span class="list-img" style="background: #17a2b8; display: inline-block; width: 40px; height: 40px; border-radius: 4px; text-align: center; line-height: 40px; color: white; font-weight: bold;">✈</span></td>
                                                    <td><span class="list-enq-name">{{ $booking->flying_from ?? 'N/A' }} → {{ $booking->flying_to ?? 'N/A' }}</span><span class="list-enq-city">{{ $booking->user->name ?? 'N/A' }}</span></td>
                                                    <td>{{ $booking->departure_date->format('d M Y') }}</td>
                                                    <td><span class="label label-primary">{{ $booking->no_of_adults + $booking->no_of_childrens }}</span></td>
                                                </tr>
                                                @empty
                                                <tr><td colspan="5" class="text-center">No flight enquiries</td></tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row 3: Custom & Event Enquiries -->
                <div class="sb2-2-3">
                    <div class="row">
                        <!--== Custom Booking Enquiry ==-->
                        <div class="col-md-6">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Custom Booking Enquiry</h4>
                                    <p>Custom travel package enquiries</p>
                                    <a class="dropdown-button drop-down-meta" href="#" data-activates="dr-custom"><i class="material-icons">more_vert</i></a>
                                    <ul id="dr-custom" class="dropdown-content">
                                        <li><a href="{{ route('admin.booking-inquiries.custom') }}"><i class="material-icons">visibility</i>View All</a></li>
                                    </ul>
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Select</th>
                                                    <th>Destination</th>
                                                    <th>Customer</th>
                                                    <th>Arrival</th>
                                                    <th>Travellers</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($customBookingsEnquiry as $idx => $booking)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" id="custom-{{ $idx }}" />
                                                        <label for="custom-{{ $idx }}"></label>
                                                    </td>
                                                    <td><span class="list-img" style="background: #dc3545; display: inline-block; width: 40px; height: 40px; border-radius: 4px; text-align: center; line-height: 40px; color: white; font-weight: bold;">{{ strtoupper(substr($booking->city ?? 'C', 0, 1)) }}</span></td>
                                                    <td><span class="list-enq-name">{{ $booking->city ?? 'N/A' }}</span><span class="list-enq-city">{{ $booking->user->name ?? 'N/A' }}</span></td>
                                                    <td>{{ $booking->arrival->format('d M Y') }}</td>
                                                    <td><span class="label label-warning">{{ $booking->howmanytravellers }}</span></td>
                                                </tr>
                                                @empty
                                                <tr><td colspan="5" class="text-center">No custom enquiries</td></tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--== Event Enquiry ==-->
                        <div class="col-md-6">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Event Enquiry</h4>
                                    <p>Event booking enquiries</p>
                                    <a class="dropdown-button drop-down-meta" href="#" data-activates="dr-event"><i class="material-icons">more_vert</i></a>
                                    <ul id="dr-event" class="dropdown-content">
                                        <li><a href="{{ route('admin.booking-inquiries.other') }}"><i class="material-icons">visibility</i>View All</a></li>
                                    </ul>
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Select</th>
                                                    <th>Event</th>
                                                    <th>Customer</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($eventBookingsEnquiry as $idx => $booking)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" id="event-{{ $idx }}" />
                                                        <label for="event-{{ $idx }}"></label>
                                                    </td>
                                                    <td><span class="list-img" style="background: #6f42c1; display: inline-block; width: 40px; height: 40px; border-radius: 4px; text-align: center; line-height: 40px; color: white; font-weight: bold;">{{ strtoupper(substr($booking->event->name ?? 'E', 0, 1)) }}</span></td>
                                                    <td><span class="list-enq-name">{{ $booking->event->name ?? 'N/A' }}</span><span class="list-enq-city">{{ $booking->user->name ?? 'N/A' }}</span></td>
                                                    <td>{{ $booking->created_at->format('d M Y') }}</td>
                                                    <td><span class="label label-success">Pending</span></td>
                                                </tr>
                                                @empty
                                                <tr><td colspan="5" class="text-center">No event enquiries</td></tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============== END ENQUIRY SECTION ============== -->

            </div>

@endsection
    