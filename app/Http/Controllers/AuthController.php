<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;
use Hash;


class AuthController extends Controller
{
    public function index()
    {
        return view('auth.signin');
    }  
      

    public function createSignin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('username', 'password');
        //dd(Auth::attempt($credentials));        
        if (Auth::attempt($credentials)) {
            
            return redirect()->intended('product')
                        ->withSuccess('Logged-in');
            
            // return redirect()->intended('dashboard')
            //             ->withSuccess('Logged-in');
        }
        return redirect("login")->withSuccess('Credentials are wrong.');
    }


    public function signup()
    {
        return view('auth.signup');
    }
      

    public function customSignup(Request $request)
    {  
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'contactNo' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required',
            'password' => 'required|min:6',
        ]);
        $data = $request->all();
        $check = $this->createUser($data);
        //dd($check);
        return redirect("login")->withSuccess('Successfully logged-in!');
    }


    public function createUser(array $data)
    {
      return User::create([
        'User_Fname' => $data['fname'],
        'User_Lname' => $data['lname'],
        'User_Address' => $data['address'],
        'ContactNo' => $data['contactNo'],
        'email' => $data['email'],
        'username' => $data['username'],
        'password' => Hash::make($data['password']),
        ''
        
        // 'name' => $data['name'],
        // 'email' => $data['email'],
        // 'password' => Hash::make($data['password'])
      ]);
    }    
    

    public function dashboardView()
    {
        if(Auth::check()){
            return view('auth.dashboard');
        }
        return redirect("login")->withSuccess('Access is not permitted');
    }
    
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
