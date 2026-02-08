@extends('layouts.admin')

@section('content')
<div class="container-fluid sb2">
    <div class="row">
        <div class="sb2-2">
            
            {{-- Breadcrumb --}}
            <div class="sb2-2-2">
                <ul>
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li class="active-bre">
                        <a href="#">Edit User</a>
                    </li>
                </ul>
            </div>

            <div class="sb2-2-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-inn-sp">

                            {{-- Title --}}
                            <div class="inn-title">
                                <h4>Edit User</h4>
                            </div>

                            {{-- Validation Errors --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul style="margin: 0; padding-left: 20px;">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="tab-inn">
                                <form method="POST" action="{{ route('admin.users.update', $user) }}">
                                    @csrf
                                    @method('PUT')
                                    @csrf
                                    @method('PUT')

                                    {{-- First & Last Name --}}
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input name="first_name" type="text" value="{{ old('first_name', $user->first_name) }}" required>
                                            <label>First Name</label>
                                            @error('first_name')
                                                <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="input-field col s6">
                                            <input name="last_name" type="text" value="{{ old('last_name', $user->last_name) }}">
                                            <label>Last Name</label>
                                        </div>
                                    </div>

                                    {{-- Phone & City --}}
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input name="phone" type="text" value="{{ old('phone', $user->phone) }}">
                                            <label>Phone</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input name="city" type="text" value="{{ old('city', $user->city) }}">
                                            <label>City</label>
                                        </div>
                                    </div>

                                    {{-- Country & Email --}}
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input name="country" type="text" value="{{ old('country', $user->country) }}">
                                            <label>Country</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input name="email" type="email" value="{{ old('email', $user->email) }}" required>
                                            <label>Email</label>
                                            @error('email')
                                                <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Password & Confirm Password --}}
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input name="password" type="password">
                                            <label>Password (Leave blank to keep current)</label>
                                            @error('password')
                                                <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="input-field col s6">
                                            <input name="password_confirmation" type="password">
                                            <label>Confirm Password</label>
                                        </div>
                                    </div>

                                    {{-- Submit --}}
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button class="waves-effect waves-light btn-large">
                                                Update User
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
