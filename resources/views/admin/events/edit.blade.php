@extends('layouts.admin')

@section('content')

<div class="sb2-2">
    <div class="sb2-2-add-blog sb2-2-1">
        <div class="box-inn-sp">
            <div class="inn-title">
                <h4>Edit Event</h4>
            </div>

            <form action="{{ route('admin.events.update',$event->id) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">

                    <div class="input-field col s12">
                        <input name="name" type="text"
                               value="{{ old('name',$event->name) }}" required>
                        <label class="active">Event Name</label>
                    </div>

                    <div class="input-field col s6">
                        <input name="date" type="date"
                               value="{{ old('date',$event->date) }}" required>
                        <label class="active">Event Date</label>
                    </div>

                    <div class="input-field col s6">
                        <input name="time" type="time"
                               value="{{ old('time',$event->time) }}" required>
                        <label class="active">Event Time</label>
                    </div>

                    <div class="input-field col s12">
                        <input name="location" type="text"
                               value="{{ old('location',$event->location) }}">
                        <label class="active">Location</label>
                    </div>

                </div>

                {{-- Current Image --}}
                @if($event->image)
                    <div class="row">
                        <div class="col s12">
                            <p>Current Image:</p>
                            <img src="{{ asset('uploads/events/'.$event->image) }}"
                                 style="width:120px;height:120px;object-fit:cover;border-radius:5px;">
                        </div>
                    </div>
                @endif

                {{-- Change Image --}}
                <div class="row">
                    <div class="col s12">
                        <div class="file-field input-field">
                            <div class="btn orange">
                                <span>Change Image</span>
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
                                style="background-color:#28a745;">
                            Update Event
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
