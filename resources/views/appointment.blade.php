@extends('layouts.app')

@section('content')
<main class="py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card card-primary">
          <div class="card-header">Doctor Information</div>
          <div class="card-body box-profile">
            <div class="text-center">
              @if (!empty($user->image))
                <td><img class="img-thumbnail img-fluid img-circle profile-user-img-front img-circle" src="{{ asset('images/users') }}/{{ $user->image }}" alt="Doctor Profile Picture"></td>
              @else
                <td><img class="img-thumbnail img-fluid img-circle profile-user-img-front img-circle" src="{{ asset('images/users/profile-default.svg') }}" alt="Doctor Profile Picture"></td>
              @endif
            </div>
            <h3 class="profile-username text-center mt-3"><b>{{ ucwords($user->name) }}</b></h3>
            <p class="text-muted text-center">{{ ucwords($user->description) }}</p>
            <ul class="list-group list-group-unbordered mb-0">
              <li class="list-group-item">
                <b>Degree</b> <a class="float-right">{{ ucwords($user->education) }}</a>
              </li>
              <li class="list-group-item">
                <b>Specialist</b> <a class="float-right">{{ $user->department }}</a>
              </li>
              <li class="list-group-item">
                <b>Email</b> <a href="mailto:{{ $user->email }}" class="float-right">{{ $user->email }}</a>
              </li>
              <li class="list-group-item border-bottom-0">
                <b>Phone</b> <a href="tel:{{ $user->phone }}" class="float-right">{{ $user->phone }}</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        @if (Session::has('message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <i class="icon fas fa-check"></i>{{ Session::get('message') }}
          </div>
        @endif
        @if (Session::has('warningmessage'))
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <i class="icon fas fa-exclamation-triangle"></i>{{ Session::get('warningmessage') }}
          </div>
        @endif
        @if (Session::has('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <i class="icon fas fa-exclamation-triangle"></i>{!! Session::get('error') !!}
          </div>
        @endif
        @if ($errors->any())
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5>
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <div class="alert alert-info alert-dismissible fade show" role="alert">
          <i class="icon fas fa-info-circle"></i>Appointment Date: <b>{{ $date }}</b>
        </div>
        @if (count($bookings_pending) > 0)
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="icon fas fa-info-circle"></i>Upcoming Visiting Times
          </div>
        @endif
        @if (count($bookings_vistited) > 0)
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="icon fas fa-info-circle"></i>Already Visited Times
          </div>
        @endif
        @if (!Auth::check())
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="icon fas fa-exclamation-triangle"></i>Please Register/Login to Make an Appointment
          </div>
        @endif
        <form action="{{ route('booking.appointment') }}" method="post">
          @csrf
          <div class="card card-primary">
            <div class="card-header">Appointment Details</div>
            @if (count($times) > 0)
              <div class="card-body pb-1">
                <div class="row">
                  @foreach ($times as $time)
                    <div class="col-md-2">
                      <div class="custom-control custom-radio btn @if (count($bookings) > 0) @foreach ($bookings as $booking) @if ($booking->time == $time->time && $booking->status == 1) bg-gradient-success btn-outline-success cursor-disabled @elseif ($booking->time == $time->time && $booking->status == 0) bg-gradient-warning btn-outline-warning cursor-disabled @endif @endforeach @endif btn-outline-secondary mb-3 appointment_time_details px-2 appointment_time_details_{{ $time->id }}">
                        <input @if (count($bookings) > 0) @foreach ($bookings as $booking) @if ($booking->time == $time->time && $booking->status == 1) disabled style="cursor: not-allowed !important;" @elseif ($booking->time == $time->time && $booking->status == 0) disabled style="cursor: not-allowed !important;" @endif @endforeach @endif class="custom-control-input cursor-pointer" type="radio" id="time_status_{{ $time->id }}" name="time_app" data-id="{{ $time->id }}" value="{{ $time->time }}">
                        <label @if (count($bookings) > 0) @foreach ($bookings as $booking) @if ($booking->time == $time->time && $booking->status == 1) disabled style="vertical-align: text-top; font-size: 14px; color: #333333; cursor: not-allowed !important;" @elseif ($booking->time == $time->time && $booking->status == 0) disabled style="vertical-align: text-top; font-size: 14px; color: #222222; cursor: not-allowed !important;" @endif @endforeach @endif for="time_status_{{ $time->id }}" class="custom-control-label cursor-pointer" style="vertical-align: text-top; font-size: 14px;">{{ $time->time }}</label>
                      </div>
                      <input type="hidden" name="doctorID" value="{{ $doctorID }}">
                      <input type="hidden" name="appointmentID" value="{{ $time->appointment_id }}">
                      <input type="hidden" name="date" value="{{ $date }}">
                    </div>
                  @endforeach
                </div>
              </div>
              <div class="card-footer">
                @if (Auth::check())
                  <button type="submit" class="btn bg-gradient-success mr-1"><i class="far fa-calendar-check mr-2"></i>Book Your Appointment</button>
                  <a href="{{ url('/') }}" class="btn bg-gradient-info"><i class="fas fa-times mr-2"></i>Back</a>
                @else
                  <a href="{{ url('/register') }}?destination=/new-appointment/{{ $doctorID }}/{{ $date }}" class="btn bg-gradient-primary"><i class="fas fa-users mr-2"></i>Register</a>
                  <a href="{{ url('/login') }}?destination=/new-appointment/{{ $doctorID }}/{{ $date }}" class="btn bg-gradient-secondary"><i class="fas fa-sign-in-alt mr-2"></i>Login</a>
                @endif
              </div>
            @else
              <div class="card-body">
                <div class="row">
                  <p class="mb-0 text-center text-danger">No Appointment Details Found to Display!</p>
                </div>
              </div>
            @endif
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
@endsection
