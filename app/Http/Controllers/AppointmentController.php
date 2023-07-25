<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Time;
use Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myappointments = Appointment::latest()->where('user_id', auth()->user()->id)->get();
        return view('admin.appointment.index', compact('myappointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.appointment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'required|unique:appointments,date,NULL,id,user_id,'.\Auth::id(),
            'time' => 'required',
        ],
        [
            'unique' => 'The Apointment Date - :input Has Already Been Taken!',
            'date.required' => 'Date Field is Required',
            'time.required' => 'Time Field is Required'
        ]);
        $appointment = Appointment::create([
            'user_id' => auth()->user()->id,
            'date' => $request->date
        ]);

        foreach ($request->time as $time) {
            Time::create([
                'appointment_id' => $appointment->id,
                'time' => $time
            ]);
        }

        return redirect()->back()->with('message', 'Appointment Has Been Booked Successfully for Date - '.$request->date);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Check the Resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
        ],
        [
            'date.required' => 'Date Field is Required',
        ]);
        $date = $request->date;
        $appointment = Appointment::where('date', $date)->where('user_id', auth()->user()->id)->first();
        if (!$appointment) {
            return redirect()->route('appointment.index')->with('error', 'Appointment is not Available for the Date - <b>'.$date.'</b>');
        }

        $appointmentID = $appointment->id;
        $times = Time::where('appointment_id', $appointmentID)->get();
        return view('admin.appointment.index', compact('appointmentID', 'times', 'date'));
    }

    public function updateTime(Request $request)
    {
        $appointmentID = $request->appointmentID;
        $appointment = Time::where('appointment_id', $appointmentID)->delete();
        foreach ($request->time as $time) {
            Time::create([
                'appointment_id' => $appointmentID,
                'time' => $time,
                'status' => 0
            ]);
        }
        return redirect()->route('appointment.index')->with('message', 'Appointment Time Updated!!!');
    }
}
