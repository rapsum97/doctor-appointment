<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Time;
use App\Models\User;
use App\Models\Booking;
use App\Models\Prescription;
use App\Mail\AppointmentMail;
use Auth;

class FrontendController extends Controller
{
    public function ipAddress() {
        $clientsIpAddress = '';
        if (getenv('HTTP_CLIENT_IP')) {
            $clientsIpAddress = getenv('HTTP_CLIENT_IP');
        }
        else if (getenv('HTTP_X_FORWARDED_FOR')) {
            $clientsIpAddress = getenv('HTTP_X_FORWARDED_FOR');
        }
        else if (getenv('HTTP_X_FORWARDED')) {
            $clientsIpAddress = getenv('HTTP_X_FORWARDED');
        }
        else if (getenv('HTTP_FORWARDED_FOR')) {
            $clientsIpAddress = getenv('HTTP_FORWARDED_FOR');
        }
        else if (getenv('HTTP_FORWARDED')) {
            $clientsIpAddress = getenv('HTTP_FORWARDED');
        }
        else if (getenv('REMOTE_ADDR')) {
            $clientsIpAddress = getenv('REMOTE_ADDR');
        }
        else {
            $clientsIpAddress = 'UNKNOWN';
        }

        return $clientsIpAddress;
    }

    public function index() {
        $clientsIpAddress = $this->ipAddress();
        $ipInfo = file_get_contents('http://ip-api.com/json/' . $clientsIpAddress);
        $ipInfo = json_decode($ipInfo);
        if (isset($ipInfo->timezone)) {
            date_default_timezone_set($ipInfo->timezone);
        }
        $doctors = [];
        if (request('date')) {
            $doctors = $this->findDoctorsBasedOnDate(request('date'));
            return view('welcome', compact('doctors'), ['filtermessage' => 'Please Check the Doctor Appointment Details Below for the Date: <b>'.request('date').'</b>!']);
        }
        $doctors = Appointment::where('date', date('Y-m-d'))->get();
        return view('welcome', compact('doctors'));
    }

    public function show($doctorID, $date) {
        $appointment = $user = [];
        $appointment = Appointment::where('user_id', $doctorID)->where('date', $date)->first();
        $user = User::where('id', $doctorID)->first();
        $times = [];
        $bookings = [];
        $bookings_vistited = [];
        $bookings_pending = [];
        if (isset($appointment->id)) {
            $times = Time::where('appointment_id', $appointment->id)->where('status', 0)->get();
            $bookings = Booking::latest()->where('user_id', auth()->user()->id)->where('doctor_id', $doctorID)->get();
            $bookings_vistited = Booking::latest()->where('user_id', auth()->user()->id)->where('doctor_id', $doctorID)->where('status', 1)->get();
            $bookings_pending = Booking::latest()->where('user_id', auth()->user()->id)->where('doctor_id', $doctorID)->where('status', 0)->get();
        }
        return view('appointment', compact('times', 'bookings', 'bookings_vistited', 'bookings_pending', 'user', 'doctorID', 'date'));
    }

    public function findDoctorsBasedOnDate($date) {
        $doctors = [];
        $doctors = Appointment::with('doctor')->where('date', $date)->get();
        return $doctors;
    }

    public function store(Request $request) {
        $clientsIpAddress = $this->ipAddress();
        $ipInfo = file_get_contents('http://ip-api.com/json/' . $clientsIpAddress);
        $ipInfo = json_decode($ipInfo);
        if (isset($ipInfo->timezone)) {
            date_default_timezone_set($ipInfo->timezone);
        }

        $request->validate(['time_app' => 'required'], ['time_app.required' => 'Please Select At Least One Field to Continue...']);

        $check = $this->checkBookingTimeInterval();
        if ($check) {
            return redirect()->back()->with('error', 'You Already Made an Appointment for this Date! Please Make an Apponitment on Others Date!');
        }

        $booking = Booking::create([
            'user_id' => auth()->user()->id,
            'doctor_id' => $request->doctorID,
            'date' => $request->date,
            'time' => $request->time_app,
            'status' => 0,
        ]);
        if ($booking) {
            Time::where('appointment_id', $request->appointmentID)->where('time', $request->time_app)->update(['status' => 1]);
        }

        // Send Email Notification
        $doctorName = User::where('id', $request->doctorID)->first();
        $mailData = [
            'name' => auth()->user()->name,
            'time' => $request->time_app,
            'date' => $request->date,
            'doctorName' => $doctorName->name
        ];
        try {
            \Mail::to(auth()->user()->email)->send(new AppointmentMail($mailData));
        }
        catch (\Exception $e) {
            return redirect()->back()->with('warningmessage', 'Your Doctor Appointment has been Booked Successfully! But Due to some reason couldn\'t Deliver a Confirmation Email to You!');
        }

        return redirect()->back()->with('message', 'Your Doctor Appointment has been Booked Successfully!');
    }

    public function checkBookingTimeInterval() {
        return Booking::orderby('id', 'DESC')->where('user_id', auth()->user()->id)->whereDate('created_at', date('Y-m-d'))->exists();
    }

    public function myBookings() {
        $appointments = [];
        $appointments = Booking::latest()->where('user_id', auth()->user()->id)->get();
        return view('booking.index', compact('appointments'));
    }

    public function myPrescriptions() {
        $prescriptions = [];
        $prescriptions = Prescription::latest()->where('user_id', auth()->user()->id)->get();
        return view('my-prescriptions', compact('prescriptions'));
    }
}
