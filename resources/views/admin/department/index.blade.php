@extends('admin.layouts.master')

@section('content')
<!-- Breadcrumbs -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Department Lists</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Department</li>
          <li class="breadcrumb-item active">List of Departments</li>
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
            <h3 class="card-title">List of Departments</h3>
          </div>
          <div class="card-body">
            <table id="data_table" class="table table-bordered table-hover">
              <thead class="thead-light">
                <tr>
                  <th>#SL No</th>
                  <th>Department Name</th>
                  <th class="nosort">Actions</th>
                </tr>
              </thead>
              <tbody>
                @if (count($departments) > 0)
                  @foreach ($departments as $key => $item)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $item->department }}</td>
                      <td>
                        <div class="table-actions">
                          <a href="{{ route('department.edit', [$item->id]) }}" class="btn btn-sm bg-gradient-success mr-0"><i class="fas fa-user-edit"></i></a>
                          <form class="form-horizontal" action="{{ route('department.destroy', [$item->id]) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm bg-gradient-danger mr-0"><i class="fas fa-trash"></i></button>
                          </form>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                @else
                  <td colspan="3" class="text-center">No Departments Found to Display!</td>
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