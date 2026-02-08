@extends('layouts.admin')

@section('content')
<div class="sb2-2">
    <h4>Add Hotel Amenity</h4>

    <form action="{{ route('admin.hotel-amenities.store') }}" method="POST">
        @csrf

        <div class="input-field col s12">
            <input type="text" name="name" value="{{ old('name') }}" required>
            <label>Amenity Name</label>
            @error('name')
                <span style="color:red;font-size:12px">{{ $message }}</span>
            @enderror
        </div>

        <button class="btn-large blue">Save Amenity</button>
    </form>
</div>
@endsection
