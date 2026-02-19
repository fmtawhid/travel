@extends('layouts.master')
@section('content')
<section>
    <div class="tr-register">
        <div class="tr-regi-form">
            <h4>Forgot <span>Password</span></h4>
            <p>No worries! Just enter your email and we'll send you a reset link.</p>

            <!-- Session Status -->
            @if (session('status'))
                <div class="alert alert-success mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                        @error('email')
                            <span class="red-text text-darken-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input type="submit" value="Send Reset Link" class="waves-effect waves-light btn-large full-btn">
                    </div>
                </div>
            </form>

            <p>
                Remembered your password? <a href="{{ route('login') }}">Login here</a>
            </p>
            <p>
                New here? <a href="{{ route('register') }}">Create an account</a>
            </p>
        </div>
    </div>
</section>
@endsection
