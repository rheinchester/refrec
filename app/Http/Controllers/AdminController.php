<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Workshop;
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
        $users = User::orderBy('name','asc')->paginate(3, ['*'], 'users');
        $workshops = Workshop::orderBy('name','asc')->paginate(3, ['*'], 'workshops');
        $data = ['users'=> $users,'workshops' =>  $workshops];
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
