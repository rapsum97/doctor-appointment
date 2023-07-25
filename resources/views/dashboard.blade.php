@extends('layouts.app')

@section('content')
<main class="py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">{{ __('Your Dashboard') }}</div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <i class="icon fas fa-check"></i>{{ session('status') }}
              </div>
            @endif
            <p class="text-muted mb-0">{{ __('You are Logged In as') }} - <b>{{ auth()->user()->name }}</b></p>
          </div>
          <div class="card-footer">
            <a class="appointment-btn bg-gradient-info mx-0" href="{{ route('index.page') }}"><i class="fas fa-home mr-2"></i>{{ __('Home') }}</a>
            <a class="appointment-btn bg-gradient-danger ml-1 mr-0" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt mr-2"></i>{{ __('Logout') }}</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
