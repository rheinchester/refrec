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
        if (auth()->user()->status == 'Active') {
            $appointment = auth()->user()->appointment;
            $workshop = Workshop::find($appointment->workshop_id);
            $data = ['appointment'=>$appointment, 'workshop'=>$workshop];
            // return($data);
            return view('home')->with($data);
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
