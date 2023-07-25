<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('templates/dist/img/AdminLTELogo.png') }}" alt="RAPSUM FAM Admin Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">RAPSUM FAM Admin</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <a class="d-block"><i class="icon fas fa-user mr-2"></i>{{ ucwords(auth()->user()->name) }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('dashboard.index') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        @if (Auth::user()->role->name == 'admin')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>Departments
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('department.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('department.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-md"></i>
              <p>Doctors
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('doctor.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('doctor.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.all') }}" class="nav-link">
              <i class="nav-icon fas fa-user-lock"></i>
              <p>Admins</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('patient.all') }}" class="nav-link">
              <i class="nav-icon fas fa-user-injured"></i>
              <p>Patients</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar-check"></i>
              <p>Patients Appointment
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('patient') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Today's Appointments</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('patient.alltime') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Appointments</p>
                </a>
              </li>
            </ul>
          </li>
        @endif
        @if (Auth::user()->role->name == 'doctor')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar-check"></i>
              <p>Appointments Details
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('appointment.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('appointment.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Check</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-injured"></i>
              <p>Patients
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('patients.today') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Today's Patients</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('prescribed.patients') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Prescribed Patients</p>
                </a>
              </li>
            </ul>
          </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      </ul>
    </nav>
  </div>
</aside>