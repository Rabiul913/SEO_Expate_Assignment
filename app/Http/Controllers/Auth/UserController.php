<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //
    public function index() {
        return view('home');
    }
    public function login()
    {
        return view('auth.login');
    }

    public function authentication(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $allsessions = Session::all();
            return redirect()->intended('home')->with(['success','You have Successfully loggedin'],['allsessions',$allsessions]);
        }
  
        return redirect("login.form")->with('alert','Oppes! You have entered invalid credentials');
    }


    public function registration()
    {
        return view('auth.registration');
    }

    public function createRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        
        // dd($request);

            $data                = new User();
            $data['name']        = $request->name;
            $data['email']       = $request->email;
            $data['password']    = Hash::make($request->password);
            $data->save();
        
         
        return redirect("login.form")->with('success','Great! You have Successfully Registered');
    }

    public function forgetPasswordForm()
    {
        return view('auth.forget_password');
    }

    public function change_password(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $password = Str::random(8);

        $user = User::where('email',$request->email)->first();
        // dd($password);
        if(!empty($user)){
            $passchange=User::where('email',$request->email)->update([
                'password'=>Hash::make($password)
            ]);

        }

        if(!empty($passchange)){
            Mail::send('This is your new password: '.$password, function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Reset Password');
            });
        }

        return back()->with('success', 'We have e-mailed your password reset link!');
    }

    public function logout() {
        Session::flush();
        Auth::logout();  
        return redirect()->route('login.form');
    }
}
