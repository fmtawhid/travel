@extends('layouts.master')
@section('content')
<section>
    <div class="tr-register">
        <div class="tr-regi-form">
            <h4>Create an <span>Account</span></h4>
            <p>It's free and always will be.</p>

            <form method="POST" action="{{ route('register') }}" class="col s12">
                @csrf

                <div class="row">
                    <div class="input-field col s12">
                        <input id="name" type="text" name="name" class="validate" placeholder="Name" 
                               value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <span class="red-text text-darken-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" type="email" name="email" class="validate" placeholder="Email" 
                               value="{{ old('email') }}" required>
                        @error('email')
                            <span class="red-text text-darken-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" type="password" name="password" class="validate" placeholder="Password" required>
                        @error('password')
                            <span class="red-text text-darken-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input id="password_confirmation" type="password" name="password_confirmation" class="validate" 
                               placeholder="Confirm Password" required>
                        @error('password_confirmation')
                            <span class="red-text text-darken-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input type="submit" value="Register" class="waves-effect waves-light btn-large full-btn">
                    </div>
                </div>

                <p>
                    Already a member? <a href="{{ route('login') }}">Click to Login</a>
                </p>
            </form>
        </div>
    </div>
</section>
@endsection
