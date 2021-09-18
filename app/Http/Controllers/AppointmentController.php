<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;
use App\Models\Appointment;
class AppointmentController extends Controller
{
    public function create($id)
    {
        $workshop = Workshop::find($id);
        $hrs = null;
        $data = ['hrs'=>$hrs, 'workshop'=> $workshop];
        return view('appointment.create')->with($data);
    }

    public function estimateCost(Request $request)
    {
        session_start();
        $request->validate(["hours" => "required|numeric"]);
        $_SESSION['hours'] = $_GET['hours'];
        $hrs = $request->input('hours');
        $cost = $hrs * 1000;
        $message = "Your total cost is NGN".strval($cost);
        $data = ['hrs'=> $hrs,'message' => $message, $cost => 'cost'];
        return redirect()->back()->with($data);
    }

    public function store($id)
    {
        session_start();
        $appointment = new Appointment;
        $appointment->hours = $_SESSION['hours'];
        $appointment->workshop_id = $id;
        $appointment->user_id = auth()->user()->id;
        $appointment->save();
        $data = ['appointment'=>$appointment, 'workshop'=>$workshop];
        return view('appointment.checkout')->with($data);
    }

    public function checkout()
    {
        
    }
}
