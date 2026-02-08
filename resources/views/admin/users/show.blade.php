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
                    <a href="#">View User</a>
                </li>
            </ul>
        </div>

        <div class="sb2-2-3">
            <div class="box-inn-sp">
                <div class="inn-title">
                    <h4>User Details</h4>
                </div>

                <div class="tab-inn">
                    <div class="row">
                        <div class="input-field col s6">
                            <input value="{{ $user->first_name }}" readonly>
                            <label class="active">First Name</label>
                        </div>

                        <div class="input-field col s6">
                            <input value="{{ $user->last_name }}" readonly>
                            <label class="active">Last Name</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <input value="{{ $user->email }}" readonly>
                            <label class="active">Email</label>
                        </div>

                        <div class="input-field col s6">
                            <input value="{{ $user->phone }}" readonly>
                            <label class="active">Phone</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <input value="{{ $user->city }}" readonly>
                            <label class="active">City</label>
                        </div>

                        <div class="input-field col s6">
                            <input value="{{ $user->country }}" readonly>
                            <label class="active">Country</label>
                        </div>
                    </div>

                    <a href="{{ route('admin.users.edit', $user) }}"
                       class="btn btn-warning">
                        Edit User
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection