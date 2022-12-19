<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
            return redirect('home')->with('success','You have Successfully loggedin');
        }
  
        return redirect("login")->with('alert','Oppes! You have entered invalid credentials');
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
        
         
        return redirect("login")->with('success','Great! You have Successfully Registered');
    }
}
