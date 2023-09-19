<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    // show the login form
    public function showLogin(){
        return view('user.login');
    }

    // show signup page
    public function showRegister(){
        return view('user.register');
    }

    // store new user from register form
    public function store(Request $request) {

        $validated = $request->validate([
            'name' => 'required|unique:users,name|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ]);

        $hashedPassword = bcrypt($validated['password']);

        $user = User::create(['name' => $validated['name'], 'email' => $validated['email'], 'password' => $hashedPassword]);
        // might not need this 👇🏼
        // $user->save();
        auth()->login($user);
        return redirect('/')->with('message', 'user created and logged in');
    }

    // authenticate user
    public function authenticate(Request $request){
        // validate inputs
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // check if input matches records
        if(auth()->attempt($validated)){
            $request->session()->regenerate();
            // redirect to homepage
            return redirect('/')->with('message', 'All good');
        }
        // otherwise send back with errors
        return back()->withErrors(['message' => 'Invalid Credentials']);
    }

    public function logout(Request $request){
        // log them out
        auth()->logout();

        // invalidate the session
        $request->session()->invalidate();

        // regenerate token
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Successful Logout!');
    }
}
