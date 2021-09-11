<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{

    public function __construct() {
        $this->middleware('guest:admin', ['except'=>['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    /**
     * Attempts login and appropriate redirects
     * 
     */
    public function login(Request $request){
        // Validate form data
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        $credentials =  ['email' => $request->email, 
                          'password' => $request->password];
                        
        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            return redirect()->intended(route('admin.dashboard'));
        }
        return redirect()->back();       
    }
    // consider using this function for users
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/');
    }


    // Intended directs people to where they are meant to go
    // Read up stuff on redirect
}
