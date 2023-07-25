@extends('admin.layouts.auth')

@section('content')
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
			<a href="{{ url('/') }}" class="h1"><b>{{ __('RAPSUM FAM') }}</b></a>
		</div>
        <div class="card-body">
            <p class="login-box-msg">{{ __('Confirm Password') }}</p>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="icon fas fa-info"></i>{{ __('Please Confirm Your Password Before Continuing...') }}
            </div>
            <form method="POST" action="{{ route('password.confirm') }}" class="mb-3">
                @csrf
                <div class="input-group mb-3">
					<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" autofocus placeholder="{{ __('Current Password') }}">
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
                <div class="row mb-0">
                    <div class="col-12">
                        <button type="submit" class="btn bg-gradient-primary btn-block"><i class="fas fa-paper-plane mr-2"></i>{{ __('Confirm Password') }}</button>
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
        </div>
    </div>
</div>
@endsection