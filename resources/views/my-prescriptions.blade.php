@extends('layouts.app')

@section('content')
<main class="py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">{{ __('Your Prescriptions') }} <b>(@if ($prescriptions->count() > 0){{ $prescriptions->count() }}@else{{ 0 }}@endif)</b></div>
          <div class="card-body">
            <table @if ($prescriptions->count() > 0) id="data_table" @endif class="table table-bordered table-hover table-responsive">
              <thead class="thead-light">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Visited Date</th>
                  <th scope="col">Doctor Name</th>
                  <th scope="col">Disease</th>
                  <th scope="col">Symptoms</th>
                  <th scope="col">List of Medicines</th>
                  <th scope="col">Procedure to Use Medicines</th>
                  <th scope="col">Doctor Feedback</th>
                </tr>
              </thead>
              <tbody>
                @if ($prescriptions->count() > 0)
                  @foreach ($prescriptions as $key => $prescription)
                    <tr>
                      <td scope="row">{{ $key+1 }}</td>
                      <td>{{ $prescription->date }}</td>
                      <td>{{ $prescription->doctor->name }}</td>
                      <td>{{ $prescription->disease }}</td>
                      <td>{{ $prescription->symptoms }}</td>
                      <td>{{ $prescription->medicine }}</td>
                      <td>{{ $prescription->medicine_procedure }}</td>
                      <td>{{ $prescription->feedback }}</td>
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="6" class="text-center">You don't have Any Prescriptions Details to Display!</td>
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
