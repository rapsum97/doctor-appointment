@extends('admin.layouts.master')

@section('content')
<main class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <i class="icon fas fa-check"></i>{{ session('status') }}
                            </div>
                        @endif
                        <p class="text-muted mb-0">{{ __('You are Logged In!') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
