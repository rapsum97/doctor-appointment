@extends('admin.layouts.auth')

@section('content')
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
			<a href="{{ url('/') }}" class="h1"><b>{{ __('RAPSUM FAM') }}</b></a>
		</div>
        <div class="card-body">
            <p class="login-box-msg">{{ __('Reset Password') }}</p>
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="icon fas fa-check"></i>{{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.update') }}" class="mb-3">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
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
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" autofocus placeholder="{{ __('New Password') }}">
                    <div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-unlock-alt"></span>
						</div>
					</div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" autofocus placeholder="{{ __('Confirm Password') }}">
                    <div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-unlock-alt"></span>
						</div>
					</div>
                </div>
                <div class="row mb-0">
                    <div class="col-12">
                        <button type="submit" class="btn bg-gradient-success btn-block"><i class="fas fa-paper-plane mr-2"></i>{{ __('Reset Password') }}</button>
                    </div>
                </div>
			</form>
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('login') }}" class="text-left">Please Login!!!</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection