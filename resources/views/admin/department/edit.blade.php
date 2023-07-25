@extends('admin.layouts.master')

@section('content')
<!-- Breadcrumbs -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Department</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Department</li>
          <li class="breadcrumb-item active">Update Department</li>
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
          <div class="card-header">
            <h3 class="card-title">Update Department</h3>
          </div>
          <form class="form-horizontal" action="{{ route('department.update', [$department->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group mb-0">
                    <label for="department">Department</label>
                    <input type="text" class="form-control @error('department') is-invalid @enderror" id="department" name="department" placeholder="Write Department Name" value="{{ $department->department }}" autocomplete="department" autofocus>
                    @error('department')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn bg-gradient-success mr-1">Update</button>
              <a href="{{ route('department.index') }}" class="btn bg-gradient-info">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection