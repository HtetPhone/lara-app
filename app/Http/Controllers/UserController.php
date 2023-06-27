<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //register form
    public function create() {
        return view('users.register');
    }

    //make new user
    public function store(Request $request){
        // dd($request);
        $formData = $request->validate([
            'name' => 'required|min:5',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);
        $formData['password'] = bcrypt($formData['password']);
        $user = User::create($formData);

        //login
        auth()->login($user);
        
        return redirect('/')->with('message', 'Registered and Logged in successfully'); 
    }

    //logout
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Logged Out Successfully!');
    }

    //login
    public function login() {
        return view('users.login');
    }

    //user auth
    public function authenticate(Request $request) {
        $formData = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        //checking here
        if(auth()->attempt($formData)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'Logged in Successfully!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}
