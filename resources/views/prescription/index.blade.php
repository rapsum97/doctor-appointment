@extends('admin.layouts.master')

@section('content')
<!-- Breadcrumbs -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Today's Patients Prescriptions List</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Prescriptions</li>
          <li class="breadcrumb-item active">Today's Patient Prescriptions</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    @if (Session::has('message'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <i class="icon fas fa-check"></i>{{ Session::get('message') }}
      </div>
    @endif

    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">{{ __('Today\'s Patient Prescriptions List') }} <b>(@if ($bookings->count() > 0){{ $bookings->count() }}@else{{ 0 }}@endif)</b></div>
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
                  <th scope="col">Action</th>
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
                      <td><button class="btn btn-sm bg-gradient-success">Visited</button></td>
                      <td>
                        @if (!App\Models\Prescription::where('user_id', $booking->user->id)->where('doctor_id', auth()->user()->id)->where('date', date('Y-m-d'))->exists())
                          <a href="#" data-toggle="modal" data-target="#prescriptionModal{{ $booking->id }}" class="btn btn-sm bg-gradient-primary"><i class="fas fa-eye mr-1"></i>Launch Prescription</a>
                        @else
                          <a href="{{ route('prescription.show', [$booking->user_id, $booking->date]) }}" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-eye mr-1"></i>View Prescription</a>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="11" class="text-center">No Patient Prescriptions Found to Display!</td>
                  </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    @if ($bookings->count() > 0)
      <!-- View Modal -->
      @include('prescription.modal')
    @endif
  </div>
</section>
@endsection