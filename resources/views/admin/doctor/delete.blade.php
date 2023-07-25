@extends('admin.layouts.master')

@section('content')
<!-- Breadcrumbs -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Doctor</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Doctor</li>
          <li class="breadcrumb-item active">Delete Doctor</li>
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
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Confirm Delete</h3>
          </div>
          <form class="form-horizontal" action="{{ route('doctor.destroy', [$user->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="card-footer pt-3">
              @if ($user->image != '')
                <p><img src="{{ asset('images/users') }}/{{ $user->image }}" class="profile-user-img-modal img-fluid img-circle"></p>
              @else
                <p><img src="{{ asset('images/users/profile-default.svg') }}" class="profile-user-img-modal img-fluid img-circle"></p>
              @endif
              <p>Do You Want to Delete the Doctor - <span><b>{{ $user->name }}</b>?</span></p>
              <button type="submit" class="btn bg-gradient-danger mr-1">Confirm</button>
              <a href="{{ route('doctor.index') }}" class="btn bg-gradient-info">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection