<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;
use App\Models\Appointment;
use App\Models\User;
class AppointmentController extends Controller
{
    public function create($id)
    {
        $workshop = Workshop::find($id);
        $hours = null;
        $data = ['hours'=>$hours, 'workshop'=> $workshop];
        return view('appointment.create')->with($data);
    }

    public function estimateCost(Request $request)
    {
        $request->validate(["hours" => "required|numeric"]);
        $hours = $request->input('hours');
        $workshop_id = $request->input('workshop_id');
        $cost = $hours * 1000;
        $message = "Your total cost is NGN".strval($cost);
        $cart_data = ['workshop_id'=> $workshop_id ,'hours'=> $hours,'message' => $message, 'cost'=> $cost ];
        return $this->cart($cart_data);
    }
    
    
    public function cart($cart_data)
    {
        $workshop = Workshop::find($cart_data['workshop_id']);
        $data = ['cost'=>$cart_data['cost'], 
                 'hours'=>$cart_data['hours'], 
                 'message'=>$cart_data['message'],
                 'workshop'=>$workshop];
        return view('appointment.cart')->with($data);
    }

    public function store(Request $request, $id)
    {
        $appointment = new Appointment;
        $appointment->hours = $request->input('hours');
        $appointment->workshop_id = $id;
        $appointment->user_id = auth()->user()->id;
        $user = User::find(auth()->user()->id);
        $workshop = Workshop::find(auth()->user()->id);
        if (empty($user->appointment)){
            $appointment->save();
            $data = ['appointment'=>$appointment, 'workshop'=>$workshop];
            return view('appointment.checkout')->with($data);
        }else {
            return view('appointment.alreadyBooked');
        }
    }

    public function show($id)
    {
        $appointment = Appointment::find($id);
        $appointment = auth()->user()->appointment;
        $workshop = Workshop::find($appointment->workshop_id);
        $data = ['appointment'=>$appointment, 'workshop'=>$workshop];
        return view('appointment.show')->with($data);
    }
}
