@extends('admin.layouts.auth')

@section('content')
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
			<a href="{{ url('/') }}" class="h1"><b>{{ __('RAPSUM FAM') }}</b></a>
		</div>
        <div class="card-body">
            <p class="login-box-msg">{{ __('Verify Your Email Address') }}</p>
            @if (session('resent'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="icon fas fa-check"></i>{{ __('A Fresh Verification Link has been Sent to Your Email Address...') }}
                </div>
            @endif

            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <i class="icon fas fa-info"></i>{{ __('Before Proceeding, Please Check Your Email for a Verification Link...') }} {{ __('If You did not Receive the Email, Please Click on Below Link') }}
            </div>
            <form method="POST" action="{{ route('verification.resend') }}" class="mb-0">
                @csrf
                <div class="row mb-0">
                    <div class="col-12">
                        <button type="submit" class="btn bg-gradient-primary btn-block"><i class="fas fa-paper-plane mr-2"></i>{{ __('Click Here to Request Another...') }}</button>
                    </div>
                </div>
			</form>
        </div>
    </div>
</div>
@endsection