<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Prescription;

class PrescriptionController extends Controller
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

        $bookings = Booking::latest()->where('doctor_id', auth()->user()->id)->where('date', date('Y-m-d'))->where('status', 1)->get();
        return view('prescription.index', compact('bookings'));
    }

    public function store(Request $request) {
        $data = $request->all();
        $data['medicine'] = implode(', ', $request->medicine);
        $data['medicine'] = rtrim($data['medicine'], ', ');
        Prescription::create($data);
        return redirect()->back()->with('message', 'Patient Prescription Created Successfully!');
    }

    public function show($userID, $date) {
        $prescription = Prescription::where('user_id', $userID)->where('date', $date)->first();
        return view('prescription.show', compact('prescription'));
    }

    // Get all the Prescribed Patients
    public function prescribedPatients() {
        $patients = Prescription::get();
        return view('prescription.all', compact('patients'));
    }
}
