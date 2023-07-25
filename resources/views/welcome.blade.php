@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <section id="hero" class="d-flex align-items-center" style="background: url({{ asset('/images/banners/banner1.jpg') }}) top center;">
            <div class="container">
                <h1>Welcome to Doctor Appointment Application</h1>
                <h5>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorem similique incidunt accusantium tenetur aut, quod, dolor inventore suscipit iste ad illo sit error maxime? Placeat eius velit deleniti dicta corporis.</h5>
                <div class="mt-4">
                    @guest
                        <a href="{{ url('/register') }}" class="btn bg-gradient-primary mb-1"><i class="fas fa-users mr-2"></i>Register As Patient</a>
                        <a href="{{ url('/login') }}" class="btn bg-gradient-secondary mb-1"><i class="fas fa-sign-in-alt mr-2"></i>Login</a>
                    @else
                        @if (auth()->check() && auth()->user()->role->name === 'patient')
                            <a class="btn bg-gradient-primary mb-1" href="{{ route('profile.index') }}"><i class="fas fa-user mr-2"></i>{{ __('My Profile') }}</a>
                            <a class="btn bg-gradient-dark mb-1" href="{{ route('my.booking') }}"><i class="fas fa-calendar-check mr-2"></i>{{ __('My Bookings') }}</a>
                            <a class="btn bg-gradient-dark mb-1" href="{{ route('my.prescriptions') }}"><i class="fas fa-prescription-bottle mr-2"></i>{{ __('My Prescriptions') }}</a>
                        @else
                            <a class="btn bg-gradient-primary mb-1" href="{{ route('dashboard.index') }}"><i class="fas fa-tachometer-alt mr-2"></i>{{ __('My Dashboard') }}</a>
                        @endif
                        <a class="btn bg-gradient-danger mb-1" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt mr-2"></i>{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endif
                </div>
            </div>
        </section>
    </div>
    <div class="container">
        @if (isset($filtermessage))
            <div class="alert alert-info alert-dismissible fade show mt-4 mb-0" role="alert">
                <i class="icon fas fa-info-circle"></i>{!! $filtermessage !!}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{-- Search Doctors --}}
        <form action="{{ url('/') }}" method="GET">
            <div class="card card-primary mt-4">
                <div class="card-header">Find Doctors</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <div class="input-group date" id="datetimeslot_front" data-target-input="nearest">
                                    <div class="input-group-prepend" data-target="#datetimeslot_front" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                    <input type="text" class="form-control datetimepicker-input" placeholder="Please Choose Date" data-target="#datetimeslot_front" name="date" value="{{ old('date') }}" required>
                                </div>
                            </div>
                            <button type="submit" class="btn bg-gradient-primary btn-block"><i class="fas fa-search mr-2"></i>Find Doctors</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        {{-- Display Doctors --}}
        <div class="card card-primary mt-4">
            <div class="card-header">Doctors</div>
            <div class="card-body">
                <table @if ($doctors->count() > 0) id="data_table" @endif class="table table-bordered table-hover table-responsive">
                    <thead class="thead-light">
                        <tr>
                            <th scope="row">#</th>
                            <th>Name</th>
                            <th>Expertise</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($doctors->count() > 0)
                            @php($i = 1)
                            @foreach ($doctors as $doctor)
                                <tr>
                                    <td scope="row">{{ $i }}</td>
                                    <td>{{ $doctor->doctor->name }}</td>
                                    <td>{{ $doctor->doctor->department }}</td>
                                    <td><a href="{{ route('create.appointment', [$doctor->user_id, $doctor->date]) }}" class="btn btn-block btn-sm bg-gradient-secondary" type="submit"><i class="far fa-calendar-check mr-2"></i>Book Appointment</a></td>
                                </tr>
                                @php($i++)
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center">No Appointment Found to Display!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
