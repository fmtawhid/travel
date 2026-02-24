@extends('layouts.master')
@section('content')
	<!--DASHBOARD-->
	<section>
		<div class="db">
			<!--LEFT SECTION-->
			<div class="db-l">
				<div class="db-l-1">
					<ul>
						<li>
                            @php
                                // যদি user object না থাকে, Auth::user() নাও
                                $currentUser = $user ?? auth()->user();
                                // চেক করে image আছে কি না
                                $avatar = $currentUser && $currentUser->image
                                            ? asset('uploads/users/'.$currentUser->image)
                                            : asset('assets/templates/images/icon/avatar.png');
                            @endphp

                            <img src="{{ $avatar }}" 
                                alt="User Avatar" 
                                width="120" 
                                style="border-radius:8px;">
                        </li>

						<li><span>80%</span> profile compl</li>
						<li><span>18</span> Notifications</li>
					</ul>
				</div>
				<div class="db-l-2">
					<ul>
						<li>
							<a href="{{ route('user.dashboard') }}"><img src="{{ asset('assets/templates/images/icon/dbl1.png') }}" alt="" /> All Bookings</a>
						</li>
						<li>
							<a href="{{ route('user.booking.tour-package') }}"><img src="{{ asset('assets/templates/images/icon/dbl2.png') }}" alt="" /> Travel Bookings</a>
						</li>
						<li>
							<a href="{{ route('user.booking.hotel') }}"><img src="{{ asset('assets/templates/images/icon/dbl3.png') }}" alt="" /> Hotel Bookings</a>
						</li>
						<li>
							<a href="{{ route('user.booking.flight') }}"><img src="{{ asset('assets/templates/images/icon/dbl5.png') }}" alt="" /> Flight Bookings</a>
						</li>
						<li>
							<a href="{{ route('user.booking.car') }}"><img src="{{ asset('assets/templates/images/icon/dbl8.png') }}" alt="" /> Car Rental Bookings</a>
						</li>
						<li>
							<a href="{{ route('user.booking.event') }}"><img src="{{ asset('assets/templates/images/icon/dbl4.png') }}" alt="" /> Event Bookings</a>
						</li>
						<li>
							<a href="{{ route('user.booking.custom') }}"><img src="{{ asset('assets/templates/images/icon/28.png') }}" alt="" /> Custom Bookings</a>
						</li>
						<li>	
							<a href="{{ route('user.profile') }}"><img src="{{ asset('assets/templates/images/icon/dbl6.png') }}" alt="" /> My Profile</a>
						</li>
						<li>
							<a href="{{ route('user.payment') }}"><img src="{{ asset('assets/templates/images/icon/dbl9.png') }}" alt="" /> Payments</a>
						</li>
						<li>
							<a href="{{ route('user.claim-refund') }}"><img src="{{ asset('assets/templates/images/icon/dbl7.png') }}" alt="" /> Claim & Refund</a>
						</li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn-logout" style="all: unset; cursor: pointer; display: flex; align-items: center;">
                                    <img src="{{ asset('assets/templates/images/icon/26.png') }}" alt="" style="margin-right: 8px; width: 23px;" />
                                    Logout
                                </button>
                            </form>
                        </li>

					</ul>
				</div>
			</div>
            @yield('user_dashboard')
            <!--RIGHT SECTION-->
			<div class="db-3">
				<h4>Notifications</h4>
				<ul>
					<li>
						<a href="#!"> <img src="{{ asset('assets/templates/images/icon/dbr1.jpg') }}" alt="" />
							<h5>50% Discount Offer</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
					<li>
						<a href="#!"> <img src="{{ asset('assets/templates/images/icon/dbr2.jpg') }}" alt="" />
							<h5>paris travel package</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
					<li>
						<a href="#!"> <img src="{{ asset('assets/templates/images/icon/dbr3.jpg') }}" alt="" />
							<h5>Group Trip - Available</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
					<li>
						<a href="#!"> <img src="{{ asset('assets/templates/images/icon/dbr4.jpg') }}" alt="" />
							<h5>world best travel agency</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
					<li>
						<a href="#!"> <img src="{{ asset('assets/templates/images/icon/dbr5.jpg') }}" alt="" />
							<h5>special travel coupons</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
					<li>
						<a href="#!"> <img src="{{ asset('assets/templates/images/icon/dbr6.jpg') }}" alt="" />
							<h5>70% Offer 2018</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
					<li>
						<a href="#!"> <img src="{{ asset('assets/templates/images/icon/dbr7.jpg') }}" alt="" />
							<h5>Popular Cities</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
					<li>
						<a href="#!"> <img src="{{ asset('assets/templates/images/icon/dbr8.jpg') }}" alt="" />
							<h5>variations of passages</h5>
							<p>All the Lorem Ipsum generators on the</p>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</section>
@endsection
