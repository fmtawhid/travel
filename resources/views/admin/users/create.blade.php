@extends('layouts.admin')

@section('content')
<div class="container-fluid sb2">
    <div class="row">
        <div class="sb2-2">
            <div class="sb2-2-2">
                <ul>
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li class="active-bre">
                        <a href="#">Add User</a>
                    </li>
                </ul>
            </div>

            <div class="sb2-2-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-inn-sp">
                            <div class="inn-title">
                                <h4>Add New User</h4>
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
                                <form method="POST" action="{{ route('admin.users.store') }}">
                                    @csrf
                                    @csrf

                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input name="first_name" type="text" value="{{ old('first_name') }}" required>
                                            <label>First Name</label>
                                            @error('first_name')
                                                <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="input-field col s6">
                                            <input name="last_name" type="text" value="{{ old('last_name') }}">
                                            <label>Last Name</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input name="phone" type="text" value="{{ old('phone') }}">
                                            <label>Phone</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input name="city" type="text" value="{{ old('city') }}">
                                            <label>City</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input name="country" type="text" value="{{ old('country') }}">
                                            <label>Country</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input name="email" type="email" value="{{ old('email') }}" required>
                                            <label>Email</label>
                                            @error('email')
                                                <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input name="password" type="password" required>
                                            <label>Password</label>
                                            @error('password')
                                                <span style="color: red; font-size: 12px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="input-field col s6">
                                            <input name="password_confirmation" type="password" required>
                                            <label>Confirm Password</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button class="waves-effect waves-light btn-large">
                                                Create User
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
