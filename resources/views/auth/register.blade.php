@extends('admin.layouts.auth')

@section('content')
<div class="register-box">
	<div class="card card-outline card-primary">
		<div class="card-header text-center">
			<a href="{{ url('/') }}" class="h1"><b>{{ __('RAPSUM FAM') }}</b></a>
		</div>
		<div class="card-body">
			<p class="login-box-msg">{{ __('Register to a Doctor Appointment Portal') }}</p>
			<form method="POST" action="{{ route('register') }}" class="mb-3">
        @csrf
				<div class="input-group mb-3">
					<input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{ __('Full Name') }}">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-user"></span>
						</div>
					</div>
					@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="input-group mb-3">
					<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('Email Address') }}">
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
					<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}">
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
				<div class="input-group mb-3">
					<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Retype Password') }}">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror" required>
						<option value="">Please Select Gender</option>
						<option value="male">Male</option>
						<option value="female">Female</option>
						<option value="other">Other</option>
					</select>
					@error('gender')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="row">
					<div class="col-12">
						<button type="submit" class="btn bg-gradient-primary btn-block"><i class="fas fa-users mr-2"></i>{{ __('Register') }}</button>
					</div>
				</div>
			</form>

			<div class="row">
				<div class="col-12">
					<a href="{{ route('login') }}" class="text-left">I already have an Account... Please Login!!!</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection