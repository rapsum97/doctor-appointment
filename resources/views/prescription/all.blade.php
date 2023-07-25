@extends('admin.layouts.master')

@section('content')
<!-- Breadcrumbs -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>All Time Prescribed Patients List</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Prescriptions</li>
          <li class="breadcrumb-item active">All Time Prescribed Patients</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">{{ __('Prescribed Patients List') }} <b>(@if ($patients->count() > 0){{ $patients->count() }}@else{{ 0 }}@endif)</b></div>
          <div class="card-body">
            <table @if ($patients->count() > 0) id="data_table" @endif class="table table-bordered table-hover">
              <thead class="thead-light">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Photo</th>
                  <th scope="col">Date</th>
                  <th scope="col">Patient</th>
                  <th scope="col">Email Address</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Doctor Name</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @if ($patients->count() > 0)
                  @foreach ($patients as $key => $patient)
                    <tr>
                      <td scope="row">{{ $key+1 }}</td>
                      <td>
                        @if ($patient->user->image != '')
                          <img src="{{ asset('images/users') }}/{{ $patient->user->image }}" alt="{{ $patient->user->image }}" class="profile-user-img img-fluid img-circle">
                        @else
                          <img src="{{ asset('images/users/profile-default.svg') }}" alt="{{ $patient->user->image }}" class="profile-user-img img-fluid img-circle">
                        @endif
                      </td>
                      <td>{{ $patient->date }}</td>
                      <td>{{ $patient->user->name }}</td>
                      <td><a href="mailto:{{ $patient->user->email }}">{{ $patient->user->email }}</a></td>
                      <td><a href="tel:{{ $patient->user->phone }}">{{ $patient->user->phone }}</a></td>
                      <td>{{ ucwords($patient->user->gender) }}</td>
                      <td>{{ $patient->doctor->name }}</td>
                      <td><button class="btn btn-sm bg-gradient-success">Visited</button></td>
                      <td>
                        <a href="{{ route('prescription.show', [$patient->user_id, $patient->date]) }}" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-eye mr-1"></i>View Prescription</a>
                      </td>
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="11" class="text-center">No Prescribed Patients Found to Display!</td>
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