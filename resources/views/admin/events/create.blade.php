@extends('layouts.admin')

@section('content')

<div class="sb2-2">
    <div class="sb2-2-add-blog sb2-2-1">
        <div class="box-inn-sp">
            <div class="inn-title">
                <h4>Add New Event</h4>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.events.store') }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="input-field col s12">
                        <input name="name" type="text"
                               value="{{ old('name') }}" required>
                        <label>Event Name</label>
                    </div>

                    <div class="input-field col s6">
                        <input name="date" type="date"
                               value="{{ old('date') }}" required>
                        <label class="active">Event Date</label>
                    </div>

                    <div class="input-field col s6">
                        <input name="time" type="time"
                               value="{{ old('time') }}" required>
                        <label class="active">Event Time</label>
                    </div>

                    <div class="input-field col s12">
                        <input name="location" type="text"
                               value="{{ old('location') }}">
                        <label>Location</label>
                    </div>

                </div>

                {{-- Image Upload --}}
                <div class="row">
                    <div class="col s12">
                        <div class="file-field input-field">
                            <div class="btn blue">
                                <span>Event Image</span>
                                <input type="file" name="image" accept="image/*">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <button class="waves-effect waves-light btn-large"
                                style="background-color:#007bff;">
                            Create Event
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
