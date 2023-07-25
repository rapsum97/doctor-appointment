@extends('admin.layouts.master')

@section('content')
<!-- Breadcrumbs -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Doctors Lists</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Doctor</li>
          <li class="breadcrumb-item active">List of Doctors</li>
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
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">List of Doctors</h3>
          </div>
          <div class="card-body">
            <table id="data_table" class="table table-bordered table-hover">
              <thead class="thead-light">
                <tr>
                  <th>Name</th>
                  <th class="nosort">Avatar</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th class="nosort">Actions</th>
                </tr>
              </thead>
              <tbody>
                @if (count($users) > 0)
                  @foreach ($users as $item)
                    <tr>
                      <td>{{ $item->name }}</td>
                      @if ($item->image != '')
                        <td><img src="{{ asset('images/users') }}/{{ $item->image }}" alt="{{ $item->image }}" class="profile-user-img img-fluid img-circle"></td>
                      @else
                        <td><img src="{{ asset('images/users/profile-default.svg') }}" alt="{{ $item->image }}" class="profile-user-img img-fluid img-circle"></td>
                      @endif
                      <td>{{ $item->email }}</td>
                      @if ($item->address != '')
                        <td>{{ $item->address }}, {{ $item->country }}, {{ $item->city }} - {{ $item->pincode }}</td>
                      @else
                        <td>-</td>
                      @endif
                      @if ($item->phone != '')
                        <td>{{ $item->phone }}</td>
                      @else
                        <td>-</td>
                      @endif
                      <td>
                        <div class="table-actions">
                          <a href="#" data-toggle="modal" data-target="#doctorModal{{ $item->id }}" class="btn btn-sm bg-gradient-primary mr-1"><i class="fas fa-eye"></i></a>
                          <a href="{{ route('doctor.edit', [$item->id]) }}" class="btn btn-sm bg-gradient-success mr-1"><i class="fas fa-user-edit"></i></a>
                          <a href="{{ route('doctor.show', [$item->id]) }}" class="btn btn-sm bg-gradient-danger"><i class="fas fa-trash"></i></a>
                        </div>
                      </td>
                    </tr>
                    <!-- View Modal -->
                    @include('admin.doctor.modal')
                  @endforeach
                @else
                  <td colspan="6" class="text-center">No Doctors Found to Display!</td>
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