@extends('layouts.user')
@section('user_dashboard')

<div class="db-2">
    <div class="db-2-com db-2-main">
        <h4>Edit My Profile</h4>

        <div class="db-2-main-com db2-form-pay db2-form-com">

            <form class="col s12"
                  action="{{ route('user.profile.update') }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="input-field col s12">
                        <input type="text"
                               name="name"
                               class="validate"
                               value="{{ $user->name }}"
                               placeholder="User Name"
                               required>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 m6">
                        <input type="email"
                               name="email"
                               class="validate"
                               value="{{ $user->email }}"
                               placeholder="Email"
                               required>
                    </div>

                    <div class="input-field col s12 m6">
                        <input type="text"
                               name="phone"
                               class="validate"
                               value="{{ $user->phone }}"
                               placeholder="Phone">
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 m6">
                        <input type="text"
                               name="city"
                               class="validate"
                               value="{{ $user->city }}"
                               placeholder="City">
                    </div>

                    <div class="input-field col s12 m6">
                        <input type="text"
                               name="country"
                               class="validate"
                               value="{{ $user->country }}"
                               placeholder="Country">
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 m6">
                        <input type="date"
                               name="date_of_birth"
                               value="{{ $user->date_of_birth }}">
                    </div>

                    <div class="input-field col s12 m6">
                        <input type="file"
                               name="image">
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12 m6">
                        <input type="password"
                               name="password"
                               placeholder="New Password">
                    </div>

                    <div class="input-field col s12 m6">
                        <input type="password"
                               name="password_confirmation"
                               placeholder="Confirm Password">
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input type="submit"
                               value="UPDATE PROFILE"
                               class="waves-effect waves-light full-btn">
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection
