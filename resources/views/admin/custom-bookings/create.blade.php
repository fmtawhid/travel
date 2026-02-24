@extends('layouts.admin')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add New Custom Package Booking</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.custom-bookings.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Name *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone *</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                            @error('phone') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="howmanytravellers" class="form-label">No. of Travellers</label>
                            <input type="number" class="form-control @error('howmanytravellers') is-invalid @enderror" id="howmanytravellers" name="howmanytravellers" value="{{ old('howmanytravellers') }}" min="1">
                            @error('howmanytravellers') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="city" class="form-label">City/Place</label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city') }}">
                            @error('city') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="arrival" class="form-label">Arrival Date</label>
                                <input type="date" class="form-control @error('arrival') is-invalid @enderror" id="arrival" name="arrival" value="{{ old('arrival') }}">
                                @error('arrival') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="departure" class="form-label">Departure Date</label>
                                <input type="date" class="form-control @error('departure') is-invalid @enderror" id="departure" name="departure" value="{{ old('departure') }}">
                                @error('departure') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="noofadults" class="form-label">No. of Adults</label>
                                <input type="number" class="form-control @error('noofadults') is-invalid @enderror" id="noofadults" name="noofadults" value="{{ old('noofadults') }}" min="1">
                                @error('noofadults') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="noofchildrens" class="form-label">No. of Childrens</label>
                                <input type="number" class="form-control @error('noofchildrens') is-invalid @enderror" id="noofchildrens" name="noofchildrens" value="{{ old('noofchildrens') }}" min="0">
                                @error('noofchildrens') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="minprice" class="form-label">Min Price</label>
                                <input type="number" step="0.01" class="form-control @error('minprice') is-invalid @enderror" id="minprice" name="minprice" value="{{ old('minprice') }}" min="0">
                                @error('minprice') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="maxprice" class="form-label">Max Price</label>
                                <input type="number" step="0.01" class="form-control @error('maxprice') is-invalid @enderror" id="maxprice" name="maxprice" value="{{ old('maxprice') }}" min="0">
                                @error('maxprice') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Add Booking</button>
                            <a href="{{ route('admin.custom-bookings.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
