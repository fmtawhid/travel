@extends('layouts.admin')

@section('content')
<div class="sb2-2">
    <h4>Edit Hotel Amenity</h4>

    <form action="{{ route('admin.hotel-amenities.update', $hotelAmenity) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="input-field col s12">
            <input type="text" name="name"
                   value="{{ old('name', $hotelAmenity->name) }}" required>
            <label class="active">Amenity Name</label>
        </div>

        <button class="btn-large blue">Update Amenity</button>
    </form>
</div>
@endsection
