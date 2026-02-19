@extends('layouts.master')
@section('content')

	<!--HEADER SECTION-->
	<section>
		<div class="v2-hom-search">
			<div class="container">
				<div class="row">
					<!-- Left Info -->
					<div class="col-md-6">
						<div class="v2-ho-se-ri">
							<h5>World's leading tour and travels template</h5>
							<h1>Tour Package booking now!</h1>
							<p>Experience the various exciting tour and travel packages and make hotel reservations, find
								vacation packages, search cheap hotels and events</p>
							<div class="ban-shrt-cut-link">
								<ul>
									<li>
										<a href="{{ route('booking.tour-package') }}"
											class="waves-effect waves-light btn-large tourz-pop-ser-btn">
											<img src="{{ asset('assets/templates/images/icon/2.png') }}" alt=""> Tour
										</a>
									</li>
									<li>
										<a href="{{ route('booking.flight') }}"
											class="waves-effect waves-light btn-large tourz-pop-ser-btn">
											<img src="{{ asset('assets/templates/images/icon/31.png') }}" alt=""> Flight
										</a>
									</li>
									<li>
										<a href="{{ route('booking.car') }}"
											class="waves-effect waves-light btn-large tourz-pop-ser-btn">
											<img src="{{ asset('assets/templates/images/icon/30.png') }}" alt=""> Car
											Rentals
										</a>
									</li>
									<li>
										<a href="{{ route('booking.hotel') }}"
											class="waves-effect waves-light btn-large tourz-pop-ser-btn">
											<img src="{{ asset('assets/templates/images/icon/1.png') }}" alt=""> Hotel
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<!-- Booking Form -->
					<div class="col-md-6">
						<div class="">
							<form class="contact__form v2-search-form book-tab-form" method="POST"
								action="{{ route('booking.tour-package.store') }}">

								@csrf

								{{-- Success --}}
								@if(session('success'))
									<div class="alert alert-success">
										{{ session('success') }}
									</div>
								@endif

								{{-- Errors --}}
								@if($errors->any())
									<div class="alert alert-danger">
										@foreach($errors->all() as $error)
											<p>{{ $error }}</p>
										@endforeach
									</div>
								@endif

								{{-- Debug: Show tour data if exists --}}
								@if($tour)
									<div class="alert alert-info">
										<strong>Debug Info:</strong><br>
										Tour ID: {{ $tour->id }}<br>
										Package ID: {{ $tour->package_id ?? 'NULL' }}<br>
										Package Name: {{ $tour->package?->name ?? 'NO PACKAGE' }}<br>
										Start Date: {{ $tour->start_date ?? 'NULL' }} (Format:
										{{ $tour->start_date ? $tour->start_date->format('m/d/Y') : 'NULL' }})<br>
										End Date: {{ $tour->end_date ?? 'NULL' }} (Format:
										{{ $tour->end_date ? $tour->end_date->format('m/d/Y') : 'NULL' }})<br>
										Location: {{ $tour->location ?? 'NULL' }}
									</div>
								@endif

								<!-- Name -->
								<div class="row">
									<div class="input-field col s12">
										<input type="text" class="validate" name="name"
											value="{{ old('name', auth()->user()?->name ?? '') }}"
											placeholder="Enter your name" required>
									</div>
								</div>

								<!-- Phone & Email -->
								<div class="row">
									<div class="input-field col s6">
										<input type="number" class="validate" name="phone"
											value="{{ old('phone', auth()->user()?->phone ?? '') }}"
											placeholder="Enter your phone" required>
									</div>
									<div class="input-field col s6">
										<input type="email" class="validate" name="email"
											value="{{ old('email', auth()->user()?->email ?? '') }}"
											placeholder="Enter your email" required>
									</div>
								</div>

								<!-- City & Package -->
								<div class="row">
									<!-- Destination -->
									<div class="input-field col s12">
										<select name="city" class="chosen-select" id="select-city-1">
											<option value="" disabled {{ old('city', $tour?->location ?? auth()->user()?->city ?? '') ? '' : 'selected' }}>Your destination</option>
											<option value="Any location" {{ old('city', $tour?->location ?? auth()->user()?->city ?? '') == 'Any location' ? 'selected' : '' }}>
												Any location
											</option>
											@foreach($destinations as $destination)
												<option value="{{ $destination->location }}" {{ old('city', $tour?->location ?? auth()->user()?->city ?? '') == $destination->location ? 'selected' : '' }}>
													{{ $destination->location }}
												</option>
											@endforeach
										</select>
									</div>

									<!-- Package -->
									<div class="input-field col s12">
										<select name="package_id" class="chosen-select" id="package-select">
											<option value="" disabled {{ old('package_id', $tour->package_id ?? '') ? '' : 'selected' }}>Select your package</option>
											@foreach($packages as $package)
												@php
													$selectedPackage = old('package_id', $tour?->package_id ?? '');
												@endphp
												<option value="{{ $package->id }}" {{ $selectedPackage == $package->id ? 'selected' : '' }}>
													{{ $package->name }}
												</option>
											@endforeach
										</select>
									</div>
								</div>


								<!-- Arrival & Departure Dates -->
								<div class="row">
									<div class="input-field col s6">
										<input type="text" class="datepicker" name="arrival" readonly
											placeholder="Arrival Date"
											value="{{ old('arrival', ($tour && $tour->start_date) ? $tour->start_date->format('m/d/Y') : '') }}">
									</div>
									<div class="input-field col s6">
										<input type="text" class="datepicker" name="departure" readonly
											placeholder="Departure Date"
											value="{{ old('departure', ($tour && $tour->end_date) ? $tour->end_date->format('m/d/Y') : '') }}">
									</div>
								</div>

								<!-- Adults & Children -->
								<div class="row">
									<div class="input-field col s6">
										<select name="noofadults" class="chosen-select">
											<option value="" disabled selected>No of adults</option>
											@for($i = 1; $i <= 6; $i++)
												<option value="{{ $i }}" {{ old('noofadults') == $i ? 'selected' : '' }}>
													{{ $i }}
												</option>
											@endfor
										</select>
									</div>
									<div class="input-field col s6">
										<select name="noofchildrens" class="chosen-select">
											<option value="" disabled selected>No of childrens</option>
											@for($i = 0; $i <= 6; $i++)
												<option value="{{ $i }}" {{ old('noofchildrens') == $i ? 'selected' : '' }}>
													{{ $i }}
												</option>
											@endfor
										</select>
									</div>
								</div>

								<!-- Min & Max Price -->
								<div class="row">
									<div class="input-field col s6">
										<input type="number" name="minprice" value="{{ old('minprice') }}"
											placeholder="Min Price" class="validate">
									</div>

									<div class="input-field col s6">
										<input type="number" name="maxprice" value="{{ old('maxprice') }}"
											placeholder="Max Price" class="validate">
									</div>
								</div>


								<!-- Submit -->
								<div class="row">
									<div class="input-field col s12">
										<input type="submit" value="Book Now"
											class="waves-effect waves-light tourz-sear-btn v2-ser-btn">
									</div>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection

@push('scripts')
	<script>
		$(document).ready(function () {
			// Debug: Log tour data
			console.log('=== Tour Form Initialization ===');
			console.log('Tour Data:', {
				tour_exists: @if($tour) true @elsefalse @endif,
				@if($tour)
							id: {{ $tour->id }},
					package_id: {{ $tour->package_id ?? 'null' }},
					location: '{{ $tour->location ?? '' }}',
					start_date: '{{ $tour->start_date ?? '' }}',
					end_date: '{{ $tour->end_date ?? '' }}'
				@endif
				});

		// Trigger chosen:updated for all selects to refresh display
		setTimeout(function () {
			$('select.chosen-select').trigger('chosen:updated');
			console.log('Chosen selects updated');
		}, 500);

		// Extra trigger for package select
		@if($tour && $tour->package_id)
			setTimeout(function () {
				var packageSelect = $('select[name="package_id"]');
				packageSelect.trigger('chosen:updated');
				console.log('Package select current value:', packageSelect.val());
			}, 700);
		@endif
			});
	</script>
@endpush