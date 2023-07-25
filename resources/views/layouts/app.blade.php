<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'DoctorApps') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('images/profile-default.svg') }}" rel="icon">
    <link href="{{ asset('images/profile-default.svg') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('templates/plugins/fontawesome-free/css/all.min.css') }}">
    {{-- <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet"> --}}
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('templates/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('templates/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('templates/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('templates/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('templates/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/script.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('templates/dist/css/adminlte.min.css') }}">
</head>
<body>
    <div id="app">
        <!-- ======= Top Bar ======= -->
        <div id="topbar" class="d-flex align-items-center">
            <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
            <div class="align-items-center d-none d-md-flex">
                <i class="bi bi-clock"></i> Monday - Saturday - 7AM to 9PM
            </div>
            <div class="d-flex align-items-center">
                <i class="bi bi-phone"></i> Call Us Now +91 (123)-4567-890
            </div>
            </div>
        </div>

        <!-- ======= Header ======= -->
        <header id="header">
            <div class="container d-flex align-items-center">
                <a class="navbar-brand logo me-auto" href="{{ url('/') }}">
                    {{ config('app.name', 'DoctorApps') }}
                </a>
                <a class="appointment-btn bg-gradient-info ml-1 mr-0" href="{{ url('/') }}"><i class="fas fa-home mr-2"></i>{{ __('Home') }}</a>
                @guest
                    @if (Route::has('login'))
                        <a class="appointment-btn bg-gradient-secondary ml-1 mr-0" href="{{ route('login') }}"><i class="fas fa-sign-in-alt mr-2"></i>{{ __('Login') }}</a>
                    @endif

                    @if (Route::has('register'))
                        <a class="appointment-btn bg-gradient-primary ml-1 mr-0" href="{{ route('register') }}"><i class="fas fa-users mr-2"></i>{{ __('Register') }}</a>
                    @endif
                @else
                    <a id="navbarDropdown" class="appointment-btn dropdown-toggle bg-gradient-primary ml-1 mr-0" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fas fa-user mr-2"></i>{{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="navbarDropdown">
                        @if (auth()->check() && auth()->user()->role->name === 'patient')
                            <a class="dropdown-item text-muted py-2" href="{{ route('dashboard.index') }}"><i class="fas fa-tachometer-alt mr-2"></i>{{ __('Dashboard') }}</a>
                            <a class="dropdown-item text-muted py-2" href="{{ route('profile.index') }}"><i class="fas fa-user mr-2"></i>{{ __('Profile') }}</a>
                        @else
                            <a class="dropdown-item text-muted py-2" href="{{ route('dashboard.index') }}"><i class="fas fa-tachometer-alt mr-2"></i>{{ __('Dashboard') }}</a>
                        @endif
                        @if (auth()->check() && auth()->user()->role->name === 'patient')
                            <a class="dropdown-item text-muted py-2" href="{{ route('my.booking') }}"><i class="far fa-calendar-check mr-2"></i>{{ __('My Bookings') }}</a>
                            <a class="dropdown-item text-muted py-2" href="{{ route('my.prescriptions') }}"><i class="fas fa-prescription-bottle mr-2"></i>{{ __('My Prescriptions') }}</a>
                        @endif
                        <a class="dropdown-item text-muted py-2" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt mr-2"></i>{{ __('Logout') }}</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @endguest
            </div>
        </header>

        @yield('content')
    </div>

    <!-- jQuery -->
    <script src="{{ asset('templates/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('templates/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('templates/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('templates/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('templates/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- DataTables & Plugins -->
    <script src="{{ asset('templates/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('templates/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('templates/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('templates/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('templates/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('templates/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('templates/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('templates/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('templates/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('templates/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('templates/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('templates/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- Custom Scripts -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
