<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // show register form
    public function create()
    {
        return view('users.register');
    }
    // save user
    public function store()
    {
        $form_info = request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        // hash password
        $form_info["password"] = bcrypt($form_info["password"]);

        // store user
        $user = User::create($form_info);

        // login user
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in successfully!');
    }
    // show login form
    public function login()
    {
        return view('users.login');
    }
    // authenticate
    public function authenticate()
    {
        $form_info = request()->validate([
            "email" => ['required', 'email'],
            "password" => ['required']
        ]);

        if (auth()->attempt($form_info)) {
            request()->session()->regenerate();
            return redirect("/")->with('message', 'You are now logged in');
        } else {
            return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
        }
    }
    // logout user
    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/')->with("message", "User have been logged out");
    }
}
