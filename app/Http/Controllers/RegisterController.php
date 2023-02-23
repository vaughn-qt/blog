<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register() {
        return view('register.register');
    }

    public function store(Request $request) {

        $attributes = request()->validate([
            'name'=>['required','max:255'],
            'username' => ['required','unique:users,username','min:5','max:40'],
            'email' => ['unique:users,email', 'email' ,'max:255'],
            'password' => ['required','min:6','max:255']
        ]);

        session()->flash('success', 'Your Account has been created');

        $user = User::create($attributes);
        auth()->login($user);

        return redirect('/');

    }
}
