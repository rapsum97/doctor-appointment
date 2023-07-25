@extends('admin.layouts.master')

@section('content')
<!-- Breadcrumbs -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Booking Doctor Appointment</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Doctors</li>
          <li class="breadcrumb-item active">Appointment</li>
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
        <form class="form-horizontal" action="{{ route('appointment.store') }}" method="POST">
          @csrf
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Choose Date</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group mb-0">
                    <div class="input-group date" id="datetimeslot" data-target-input="nearest">
                      <div class="input-group-prepend" data-target="#datetimeslot" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                      <input type="text" class="form-control datetimepicker-input" placeholder="Please Choose Date" data-target="#datetimeslot" name="date">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Morning -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Choose Morning Time Slots</h3>
              <div class="custom-control custom-checkbox float-right">
                <input class="custom-control-input custom-control-input-dark morning" type="checkbox" id="morning_slots" onclick="for (c in document.getElementsByClassName('morning')) document.getElementsByClassName('morning').item(c).checked = this.checked">
                <label for="morning_slots" class="custom-control-label">Check/Uncheck All</label>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered">
                <tbody>
                  @for ($i = 7; $i <= 11; $i++)
                    <tr>
                      @if ($i == 7)
                        <th rowspan="5" style="vertical-align : middle;text-align:center;">Please Select Your Time Slots</th>
                      @endif
                      <th>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input morning" type="checkbox" id="customCheckbox{{ $i }}am_1" name="time[]" value="{{ $i }}am">
                          <label for="customCheckbox{{ $i }}am_1" class="custom-control-label">{{ $i }}am</label>
                        </div>
                      </th>
                      <th>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input morning" type="checkbox" id="customCheckbox{{ $i }}am_2" name="time[]" value="{{ $i }}.20am">
                          <label for="customCheckbox{{ $i }}am_2" class="custom-control-label">{{ $i }}.20am</label>
                        </div>
                      </th>
                      <th>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input morning" type="checkbox" id="customCheckbox{{ $i }}am_3" name="time[]" value="{{ $i }}.40am">
                          <label for="customCheckbox{{ $i }}am_3" class="custom-control-label">{{ $i }}.40am</label>
                        </div>
                      </th>
                    </tr>
                  @endfor
                </tbody>
              </table>
            </div>
          </div>
          <!-- Afternoon -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Choose Afternoon Time Slots</h3>
              <div class="custom-control custom-checkbox float-right">
                <input class="custom-control-input custom-control-input-dark afternoon" type="checkbox" id="afternoon_slots" onclick="for (c in document.getElementsByClassName('afternoon')) document.getElementsByClassName('afternoon').item(c).checked = this.checked">
                <label for="afternoon_slots" class="custom-control-label">Check/Uncheck All</label>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered">
                <tbody>
                  <tr>
                    <th rowspan="4" style="vertical-align : middle;text-align:center;">Please Select Your Time Slots</th>
                    <th>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input afternoon" type="checkbox" id="customCheckbox12pm_1" name="time[]" value="12pm">
                        <label for="customCheckbox12pm_1" class="custom-control-label">12pm</label>
                      </div>
                    </th>
                    <th>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input afternoon" type="checkbox" id="customCheckbox12pm_2" name="time[]" value="12.20pm">
                        <label for="customCheckbox12pm_2" class="custom-control-label">12.20pm</label>
                      </div>
                    </th>
                    <th>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input afternoon" type="checkbox" id="customCheckbox12pm_3" name="time[]" value="12.40pm">
                        <label for="customCheckbox12pm_3" class="custom-control-label">12.40pm</label>
                      </div>
                    </th>
                  </tr>
                  @for ($i = 1; $i <= 3; $i++)
                    <tr>
                      <th>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input afternoon" type="checkbox" id="customCheckbox{{ $i }}pm_1" name="time[]" value="{{ $i }}pm">
                          <label for="customCheckbox{{ $i }}pm_1" class="custom-control-label">{{ $i }}pm</label>
                        </div>
                      </th>
                      <th>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input afternoon" type="checkbox" id="customCheckbox{{ $i }}pm_2" name="time[]" value="{{ $i }}.20pm">
                          <label for="customCheckbox{{ $i }}pm_2" class="custom-control-label">{{ $i }}.20pm</label>
                        </div>
                      </th>
                      <th>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input afternoon" type="checkbox" id="customCheckbox{{ $i }}pm_3" name="time[]" value="{{ $i }}.40pm">
                          <label for="customCheckbox{{ $i }}pm_3" class="custom-control-label">{{ $i }}.40pm</label>
                        </div>
                      </th>
                    </tr>
                  @endfor
                </tbody>
              </table>
            </div>
          </div>
          <!-- Evening -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Choose Evening Time Slots</h3>
              <div class="custom-control custom-checkbox float-right">
                <input class="custom-control-input custom-control-input-dark evening" type="checkbox" id="evening_slots" onclick="for (c in document.getElementsByClassName('evening')) document.getElementsByClassName('evening').item(c).checked = this.checked">
                <label for="evening_slots" class="custom-control-label">Check/Uncheck All</label>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered">
                <tbody>
                  @for ($i = 4; $i <= 7; $i++)
                    <tr>
                      @if ($i == 4)
                        <th rowspan="4" style="vertical-align : middle;text-align:center;">Please Select Your Time Slots</th>
                      @endif
                      <th>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input evening" type="checkbox" id="customCheckbox{{ $i }}pm_1" name="time[]" value="{{ $i }}pm">
                          <label for="customCheckbox{{ $i }}pm_1" class="custom-control-label">{{ $i }}pm</label>
                        </div>
                      </th>
                      <th>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input evening" type="checkbox" id="customCheckbox{{ $i }}pm_2" name="time[]" value="{{ $i }}.20pm">
                          <label for="customCheckbox{{ $i }}pm_2" class="custom-control-label">{{ $i }}.20pm</label>
                        </div>
                      </th>
                      <th>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input evening" type="checkbox" id="customCheckbox{{ $i }}pm_3" name="time[]" value="{{ $i }}.40pm">
                          <label for="customCheckbox{{ $i }}pm_3" class="custom-control-label">{{ $i }}.40pm</label>
                        </div>
                      </th>
                    </tr>
                  @endfor
                </tbody>
              </table>
            </div>
          </div>
          <!-- Night -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Choose Night Time Slots</h3>
              <div class="custom-control custom-checkbox float-right">
                <input class="custom-control-input custom-control-input-dark night" type="checkbox" id="night_slots" onclick="for (c in document.getElementsByClassName('night')) document.getElementsByClassName('night').item(c).checked = this.checked">
                <label for="night_slots" class="custom-control-label">Check/Uncheck All</label>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered">
                <tbody>
                  @for ($i = 8; $i <= 10; $i++)
                    <tr>
                      @if ($i == 8)
                        <th rowspan="3" style="vertical-align : middle;text-align:center;">Please Select Your Time Slots</th>
                      @endif
                      <th>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input night" type="checkbox" id="customCheckbox{{ $i }}pm_1" name="time[]" value="{{ $i }}pm">
                          <label for="customCheckbox{{ $i }}pm_1" class="custom-control-label">{{ $i }}pm</label>
                        </div>
                      </th>
                      <th>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input night" type="checkbox" id="customCheckbox{{ $i }}pm_2" name="time[]" value="{{ $i }}.20pm">
                          <label for="customCheckbox{{ $i }}pm_2" class="custom-control-label">{{ $i }}.20pm</label>
                        </div>
                      </th>
                      <th>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input night" type="checkbox" id="customCheckbox{{ $i }}pm_3" name="time[]" value="{{ $i }}.40pm">
                          <label for="customCheckbox{{ $i }}pm_3" class="custom-control-label">{{ $i }}.40pm</label>
                        </div>
                      </th>
                    </tr>
                  @endfor
                </tbody>
              </table>
            </div>
          </div>

          <div class="card mb-4" style="box-shadow: none; background: transparent;">
            <div class="card-body p-0 pt-1">
              <button type="submit" class="btn bg-gradient-primary mr-1">Continue</button>
              <button type="reset" class="btn bg-gradient-info">Cancel</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection