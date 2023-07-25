<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientListController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\DepartmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class, 'index'])->name('index.page');

// List of Appointments Slots
Route::get('/new-appointment/{doctorID}/{date}', [FrontendController::class, 'show'])->name('create.appointment');

// Patients
Route::group(['middleware' => ['auth', 'patient']], function() {
    // Booking
    Route::post('/book/appointment', [FrontendController::class, 'store'])->name('booking.appointment');
    Route::get('/my-booking', [FrontendController::class, 'myBookings'])->name('my.booking');

    // Profile Details
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
    Route::post('/profile-image', [ProfileController::class, 'profileImage'])->name('profile.image');
    Route::get('/my-prescriptions', [FrontendController::class, 'myPrescriptions'])->name('my.prescriptions');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Auth::routes(['verify' => TRUE]);
Route::get('/home', [FrontendController::class, 'index'])->name('home');

/* ------- ADMIN ------- */

// Admin Role
Route::group(['middleware' => ['auth', 'admin']], function() {
    // Admin List
    Route::get('/admins', [DashboardController::class, 'display'])->name('admin.all');
    // Doctors
    Route::resource('doctor', DoctorController::class);
    // Patients
    Route::get('/patient', [PatientListController::class, 'display'])->name('patient.all');
    Route::get('/patients', [PatientListController::class, 'index'])->name('patient');
    Route::get('/patients/all', [PatientListController::class, 'allTimes'])->name('patient.alltime');
    Route::get('/patient/status/update/{id}', [PatientListController::class, 'statusUpdate'])->name('update.status');
    // Departments
    Route::resource('department', DepartmentController::class);
});

// Doctor Role
Route::group(['middleware' => ['auth', 'doctor']], function() {
    // Appointments
    Route::resource('appointment', AppointmentController::class);
    Route::post('/appointment/check', [AppointmentController::class, 'check'])->name('appointment.check');
    Route::post('/appointment/update', [AppointmentController::class, 'updateTime'])->name('update');
    // Prescriptions
    Route::get('/patients-today', [PrescriptionController::class, 'index'])->name('patients.today');
    Route::post('/prescription', [PrescriptionController::class, 'store'])->name('prescription');
    Route::get('/prescription/{userID}/{date}', [PrescriptionController::class, 'show'])->name('prescription.show');
    Route::get('/patients-prescribed', [PrescriptionController::class, 'prescribedPatients'])->name('prescribed.patients');
});