@extends('layouts.master')
@section('content')
<section>
    <div class="tr-register">
        <div class="tr-regi-form">
            <h4>Sign <span>In</span></h4>
            <p>It's free and always will be.</p>

            <form method="POST" action="{{ route('login') }}" class="col s12">
                @csrf

                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" type="email" name="email" class="validate" placeholder="Email" 
                               value="{{ old('email') }}" required autofocus>
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
                    <div class="col s12">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span>Remember me</span>
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input type="submit" value="Login" class="waves-effect waves-light btn-large full-btn">
                    </div>
                </div>

                <p>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Forgot password?</a>
                    @endif
                    | Are you a new user? <a href="{{ route('register') }}">Register</a>
                </p>

            </form>

            {{-- <div class="soc-login">
                <h4>Sign in using</h4>
                <ul>
                    <li><a href="#"><i class="fa fa-facebook fb1"></i> Facebook</a></li>
                    <li><a href="#"><i class="fa fa-twitter tw1"></i> Twitter</a></li>
                    <li><a href="#"><i class="fa fa-google-plus gp1"></i> Google</a></li>
                </ul>
            </div> --}}
        </div>
    </div>
</section>
@endsection
