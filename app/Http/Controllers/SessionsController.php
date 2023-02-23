<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create() {
        return view('sessions.create');
    }

    public function login() {
        $attributes = request()->validate([
            'username' => ['required','exists:users,username'],
            'password' => 'required'
        ]);

        if(! auth()->attempt($attributes)){
            throw ValidationException::withMessages([
                'username' => 'Username not Found',
            ]);


        }

        session()->regenerate();
        return redirect('/');

    }

    public function destroy(){
        auth()->logout();

        return redirect('/login')->with('success','Logged Out');
    }
}
