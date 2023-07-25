<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;

class PatientListController extends Controller
{
    public function display()
    {
        $users = User::latest()->where('role_id', '=', 3)->get();
        return view('admin.patientlist.display', compact('users'));
    }

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

    public function index(Request $request)
    {
        $clientsIpAddress = $this->ipAddress();
        $ipInfo = file_get_contents('http://ip-api.com/json/' . $clientsIpAddress);
        $ipInfo = json_decode($ipInfo);
        if (isset($ipInfo->timezone)) {
            date_default_timezone_set($ipInfo->timezone);
        }

        if (isset($request->date)) {
            $bookings = Booking::latest()->where('date', $request->date)->get();
            return view('admin.patientlist.index', compact('bookings'), ['filtermessage' => 'Patients Appointment Details are Listed Below for the Date: <b>'.$request->date.'</b>!']);
        }

        $bookings = Booking::latest()->where('date', date('Y-m-d'))->get();
        return view('admin.patientlist.index', compact('bookings'));
    }

    public function statusUpdate($id) {
        $booking = Booking::find($id);
        $booking->status =! $booking->status;
        $booking->save();
        return redirect()->back()->with('message', 'Updated the Patient Appointment Status Successfully!');
    }

    public function allTimes() {
        $bookings = Booking::latest()->get();
        return view('admin.patientlist.all', compact('bookings'));
    }
}
