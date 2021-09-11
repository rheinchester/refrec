<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $users = User::All();
        $users = User::orderBy('name','asc')->get();
        $response = 'THere are no users';
        $data = ['users'=> $users,'response' =>  $response];
        return view('admin')->with($data);
    }

    public function editUserStatus($id)
    {
        $user = User::find($id);
        return view('user-status')->with(['user'=>$user, 'message'=>'']);
    }

    public function updateStatus(Request $request, $id)
    {
        $user = User::find($id);
        $user->status = $request->status;
        $data = ['user'=>$user, 'message'=> 'Successfully updated'];
        $user->save();
        return view('user-status')->with($data);
    }
}
