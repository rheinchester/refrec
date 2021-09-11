<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except'=>['logout', 'userLogout']]);
    }

    public function userLogout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }

    public function isActive($user)
    {
        return $user->status == 'Active'?True:False;
    }

    protected function authenticated(Request $request, $user)
    {
        if ($this->isActive($user)){
            return redirect('/home');
        }else{
            return redirect('/waiting-page');
        }
    }


    // public function login(Request $request){
    //     // Validate form data
        
    //     $this->validate($request, [
    //         'email'=>'required|email',
    //         'password'=>'required|min:6'
    //     ]);
    //     $credentials =  ['email' => $request->email, 
    //     'password' => $request->password];
    //     if (Auth::attempt($credentials)) {
    //         return 'home';
    //         // Authentication passed...
    //         return redirect()->intended(route('waiting-page'));
    //     }

    //     if (Auth::guard('web')->attempt($credentials, $request->remember)) {
    //         return view('Waiting-page');
    //         return 'status';
    //         // if (Auth::user()->status == 'Inactive') {
    //         //     return redirect()->back();
    //         // }else {
    //         //     return redirect()->intended(route('home'));
            // }
    //     }
    // }
}
