@extends('admin.layouts.auth')

@section('content')
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
			<a href="{{ url('/') }}" class="h1"><b>{{ __('RAPSUM FAM') }}</b></a>
		</div>
        <div class="card-body">
            <p class="login-box-msg">{{ __('Login to a Doctor Appointment Portal') }}</p>
            <form method="POST" action="{{ route('login') }}" class="mb-3">
                @csrf
				<div class="input-group mb-3">
					<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('Email Address') }}">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-envelope"></span>
						</div>
					</div>
					@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="input-group mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
					@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
                <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input cursor-pointer" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" class="custom-control-label cursor-pointer">{{ __('Remember Me') }}</label>
                </div>
                <div class="row mb-0">
                    <div class="col-12">
                        <button type="submit" class="btn bg-gradient-primary btn-block"><i class="fas fa-sign-in-alt mr-2"></i>{{ __('Login') }}</button>
                    </div>
                </div>
			</form>
            @if (Route::has('password.request'))
                <div class="row mb-1">
                    <div class="col-12">
                        <a class="text-left text-red" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('register') }}" class="text-left">Don't have an Account... Please Create!!!</a>
                </div>
            </div>
        </div>
    </div>
</div>