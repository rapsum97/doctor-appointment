@extends('layouts.app')

@section('content')
<main class="py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">{{ __('Your Appointments') }} <b>(@if ($appointments->count() > 0){{ $appointments->count() }}@else{{ 0 }}@endif)</b></div>
          <div class="card-body">
            <table @if ($appointments->count() > 0) id="data_table" @endif class="table table-bordered table-hover table-responsive">
              <thead class="thead-light">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Doctor Name</th>
                  <th scope="col">Time</th>
                  <th scope="col">Appointment Date</th>
                  <th scope="col">Applied Date</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                @if ($appointments->count() > 0)
                  @foreach ($appointments as $key => $appointment)
                    <tr>
                      <td scope="row">{{ $key+1 }}</td>
                      <td>{{ $appointment->doctor->name }}</td>
                      <td>{{ $appointment->time }}</td>
                      <td>{{ $appointment->date }}</td>
                      <td>{{ $appointment->created_at }}</td>
                      <td>
                        @if ($appointment->status == 0)
                          <button class="btn btn-sm bg-gradient-primary">Not Visited</button>
                        @else
                          <button class="btn btn-sm bg-gradient-success">Visited</button>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="6" class="text-center">You don't have Any Booking Details to Display!</td>
                  </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
