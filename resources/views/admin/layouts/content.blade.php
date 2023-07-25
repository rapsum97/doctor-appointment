@extends('admin.layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      @if (auth()->user()->role->name == 'admin')
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ App\Models\User::where('role_id', 3)->count() }}</h3>
              <p class="mb-0">Total Patients</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-injured"></i>
            </div>
            <a href="{{ route('patient.all') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ App\Models\User::where('role_id', 2)->count() }}</h3>
              <p class="mb-0">Total Doctors</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-md"></i>
            </div>
            <a href="{{ route('doctor.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ App\Models\Booking::where('date', date('Y-m-d'))->count() }}</h3>
              <p class="mb-0">Today's Bookings</p>
            </div>
            <div class="icon">
              <i class="fas fa-registered"></i>
            </div>
            <a href="{{ route('patient') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ App\Models\Booking::where('status', 0)->count() }}</h3>
              <p class="mb-0">Total Pending Bookings</p>
            </div>
            <div class="icon">
              <i class="fas fa-registered"></i>
            </div>
            <a href="{{ route('patient.alltime') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>{{ App\Models\Booking::where('status', 1)->count() }}</h3>
              <p class="mb-0">Total Visited Bookings</p>
            </div>
            <div class="icon">
              <i class="fas fa-registered"></i>
            </div>
            <a href="{{ route('patient.alltime') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-secondary">
            <div class="inner">
              <h3>{{ App\Models\Prescription::count() }}</h3>
              <p class="mb-0">Total Prescriptions</p>
            </div>
            <div class="icon">
              <i class="fas fa-prescription"></i>
            </div>
            <a href="{{ route('prescribed.patients') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-dark">
            <div class="inner">
              <h3>{{ App\Models\Department::count() }}</h3>
              <p class="mb-0">Total Departments</p>
            </div>
            <div class="icon">
              <i class="fas fa-building"></i>
            </div>
            <a href="{{ route('department.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      @elseif (auth()->user()->role->name == 'doctor')
        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ App\Models\Booking::where('date', date('Y-m-d'))->where('doctor_id', auth()->user()->id)->count() }}</h3>
              <p class="mb-0">Today's Bookings</p>
            </div>
            <div class="icon">
              <i class="fas fa-registered"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ App\Models\Booking::where('doctor_id', auth()->user()->id)->where('status', 0)->count() }}</h3>
              <p class="mb-0">Total Pending Bookings</p>
            </div>
            <div class="icon">
              <i class="fas fa-registered"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>{{ App\Models\Booking::where('doctor_id', auth()->user()->id)->where('status', 1)->count() }}</h3>
              <p class="mb-0">Total Visited Bookings</p>
            </div>
            <div class="icon">
              <i class="fas fa-registered"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-secondary">
            <div class="inner">
              <h3>{{ App\Models\Prescription::where('doctor_id', auth()->user()->id)->count() }}</h3>
              <p class="mb-0">Total Prescriptions</p>
            </div>
            <div class="icon">
              <i class="fas fa-prescription"></i>
            </div>
          </div>
        </div>
      @endif
    </div>
  </div>
</section>
@endsection