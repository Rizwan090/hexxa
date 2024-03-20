<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name'     => ['required', 'max:255'],
            'username' => ['required', 'min:3', 'max:255', 'unique:users,username'],
            'email'    => ['required', 'email', 'max:255', 'unique:users,email', 'valid_email_with_dot'],
            'password' => ['required', 'min:7', 'max:255'],
        ]);


        $user = new User($attributes);
        $user->save();
        auth()->login($user);

        return redirect('/')->with('success' , 'your account has been created');
    }

}
