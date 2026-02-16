@extends('layouts.admin')

@section('content')

<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-home"></i> Dashboard
                </a>
            </li>
            <li class="active-bre">
                <a href="#">Website Settings</a>
            </li>
        </ul>
    </div>

    <div class="sb2-2-add-blog sb2-2-1">
        <h2>Website Settings</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin:0;padding-left:20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">

                {{-- Company Name --}}
                <div class="input-field col s12">
                    <input type="text" name="name" value="{{ old('name', $setting->name) }}">
                    <label class="active">Company Name</label>
                </div>

                {{-- Logo --}}
                <div class="input-field col s6">
                    <p>Logo</p>
                    <input type="file" name="logo" accept="image/*">
                    @if($setting->logo)
                        <img src="{{ asset('uploads/settings/'.$setting->logo) }}" width="120" style="margin-top:10px;">
                    @endif
                </div>

                {{-- Favicon --}}
                <div class="input-field col s6">
                    <p>Favicon</p>
                    <input type="file" name="favicon" accept="image/*">
                    @if($setting->favicon)
                        <img src="{{ asset('uploads/settings/'.$setting->favicon) }}" width="50" style="margin-top:10px;">
                    @endif
                </div>

                {{-- Phone --}}
                <div class="input-field col s6">
                    <input type="text" name="phone" value="{{ old('phone', $setting->phone) }}">
                    <label class="active">Phone</label>
                </div>

                {{-- Email --}}
                <div class="input-field col s6">
                    <input type="email" name="email" value="{{ old('email', $setting->email) }}">
                    <label class="active">Email</label>
                </div>

                {{-- Location --}}
                <div class="input-field col s12">
                    <input type="text" name="location" value="{{ old('location', $setting->location) }}">
                    <label class="active">Location</label>
                </div>

                <div class="col s12"><h5>Social Media</h5></div>

                <div class="input-field col s6">
                    <input type="url" name="facebook" value="{{ old('facebook', $setting->facebook) }}">
                    <label class="active">Facebook</label>
                </div>

                <div class="input-field col s6">
                    <input type="url" name="instagram" value="{{ old('instagram', $setting->instagram) }}">
                    <label class="active">Instagram</label>
                </div>

                <div class="input-field col s6">
                    <input type="url" name="x" value="{{ old('x', $setting->x) }}">
                    <label class="active">X (Twitter)</label>
                </div>

                <div class="input-field col s6">
                    <input type="url" name="linkedin" value="{{ old('linkedin', $setting->linkedin) }}">
                    <label class="active">LinkedIn</label>
                </div>

                <div class="input-field col s12">
                    <input type="url" name="youtube" value="{{ old('youtube', $setting->youtube) }}">
                    <label class="active">YouTube</label>
                </div>

            </div>

            <div class="row">
                <div class="input-field col s12">
                    <button type="submit" class="waves-effect waves-light btn-large blue">
                        Update Settings
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
