@extends('admin.layouts.master')

@section('content')
<!-- Breadcrumbs -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Patients Prescriptions Details</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Prescriptions</li>
          <li class="breadcrumb-item active">Prescriptions Details</li>
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
          <div class="card-header">{{ __('Patient Prescription Details') }}</div>
          <div class="card-body">
            <div class="style2">
              <p><b>Date:</b> {{ $prescription->date }}</p>
              <p><b>Name of Doctor:</b> {{ $prescription->doctor->name }}</p>
              <p><b>Patient Name:</b> {{ $prescription->user->name }}</p>
              <p><b>Gender:</b> {{ ucfirst($prescription->user->gender) }}</p>
              <p><b>Name of the Disease:</b> {{ $prescription->disease }}</p>
              <p><b>List of Symptoms:</b> {{ $prescription->symptoms }}</p>
              <p><b>List of Medicines:</b> {{ $prescription->medicine }}</p>
              <p><b>Procedure to Use Medicines:</b> {{ $prescription->medicine_procedure }}</p>
              <p><b>Feedback:</b> {{ $prescription->feedback }}</p>
              <p class="mb-0"><b>Doctor Signature:</b> {{ $prescription->signature }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection