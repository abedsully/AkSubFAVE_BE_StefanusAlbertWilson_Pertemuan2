<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    public function store(Request $request){
        $validation = $request->validate([
            'fullname' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|unique:users|email:dns',
            'password' => 'required|min:8',
            'confirm' => 'required|min:8|same:password',
        ]);

        $validation['password'] = bcrypt($validation['password']);
        $validation['confirm'] = bcrypt($validation['confirm']);

        User::create($validation);
        return redirect('/login');
    }
}
