<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;

class HomeController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { //remember that user->appointment returns zero if empty   
        $user = auth()->user();
        
        // if ($user->status == 'Active') {
        if(!$user->appointment){//if there is no appointment return home with nothing
            // return $user->appointment;
            return view('home');
        }else {
            $appointment = $user->appointment;// don't know if it will work
            $workshop = Workshop::find($appointment->workshop_id);//if there's an appointment there must be a worshop
            $data = ['appointment'=>$appointment, 'workshop'=>$workshop];
            return view('home')->with($data);
        }
        // }
        // else{
        //     return $this->getWaitingPage();
        // }
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function oldIndex()
    { //remember that user->appointment returns zero if empty   
        $user = auth()->user();
        
        if ($user->status == 'Active') {
            if(!$user->appointment){//if there is no appointment return home with nothing
                // return $user->appointment;
                return view('home');
            }else {
                $appointment = $user->appointment;// don't know if it will work
                $workshop = Workshop::find($appointment->workshop_id);//if there's an appointment there must be a worshop
                $data = ['appointment'=>$appointment, 'workshop'=>$workshop];
                return view('home')->with($data);
            }
        }
        else{
            return $this->getWaitingPage();
        }
    }

    public function getWaitingPage()
    {
        return view('waiting-page');
    }
}


// $appointment = auth()->user()->appointment;
// return empty($appointment);
// $workshop = Workshop::find($appointment->workshop_id);
// if ($workshop) {
//     $data = ['appointment'=>$appointment, 'workshop'=>$workshop];
//     return view('home')->with($data);
// }
// // return'logged in';
