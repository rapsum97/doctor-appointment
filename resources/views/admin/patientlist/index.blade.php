@extends('admin.layouts.master')

@section('content')
<!-- Breadcrumbs -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Today's Patient Appointments List</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Patients</li>
          <li class="breadcrumb-item active">Today's Patient Appointments</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    @if (isset($filtermessage))
      <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="icon fas fa-info-circle"></i>{!! $filtermessage !!}
      </div>
    @endif
    @if (Session::has('message'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <i class="icon fas fa-check"></i>{{ Session::get('message') }}
      </div>
    @endif

    <div class="row">
      <div class="col-md-12">
        <form class="form-horizontal" action="{{ route('patient') }}" method="GET">
          @csrf
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Choose Date</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group mb-0">
                    <div class="input-group date" id="datetimeslot" data-target-input="nearest">
                      <div class="input-group-prepend" data-target="#datetimeslot" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                      <input type="text" class="form-control datetimepicker-input" placeholder="Please Choose Date to Check" data-target="#datetimeslot" name="date" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn bg-gradient-primary mr-1">Check</button>
              <button type="reset" class="btn bg-gradient-info">Cancel</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">{{ __('Today\'s Patient Appointments List') }} <b>(@if ($bookings->count() > 0){{ $bookings->count() }}@else{{ 0 }}@endif)</b></div>
          <div class="card-body">
            <table @if ($bookings->count() > 0) id="data_table" @endif class="table table-bordered table-hover">
              <thead class="thead-light">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Photo</th>
                  <th scope="col">Date</th>
                  <th scope="col">Patient</th>
                  <th scope="col">Email Address</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Time</th>
                  <th scope="col">Doctor Name</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                @if ($bookings->count() > 0)
                  @foreach ($bookings as $key => $booking)
                    <tr>
                      <td scope="row">{{ $key+1 }}</td>
                      <td>
                        @if ($booking->user->image != '')
                          <img src="{{ asset('images/users') }}/{{ $booking->user->image }}" alt="{{ $booking->user->image }}" class="profile-user-img img-fluid img-circle">
                        @else
                          <img src="{{ asset('images/users/profile-default.svg') }}" alt="{{ $booking->user->image }}" class="profile-user-img img-fluid img-circle">
                        @endif
                      </td>
                      <td>{{ $booking->date }}</td>
                      <td>{{ $booking->user->name }}</td>
                      <td><a href="mailto:{{ $booking->user->email }}">{{ $booking->user->email }}</a></td>
                      <td><a href="tel:{{ $booking->user->phone }}">{{ $booking->user->phone }}</a></td>
                      <td>{{ ucwords($booking->user->gender) }}</td>
                      <td>{{ $booking->time }}</td>
                      <td>{{ $booking->doctor->name }}</td>
                      <td>
                        @if ($booking->status == 0)
                          <a href="{{ route('update.status', [$booking->id]) }}" class="btn btn-sm bg-gradient-primary">Pending</a>
                        @else
                          <a href="{{ route('update.status', [$booking->id]) }}" class="btn btn-sm bg-gradient-success">Visited</a>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="10" class="text-center">No Patient Appointment Found to Display!</td>
                  </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
