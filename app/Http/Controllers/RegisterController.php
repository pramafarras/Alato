<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Routing\RedirectController;

class RegisterController extends Controller
{
    public function index(){
        return view('register', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }



    public function store(Request $request){
        $validatedData = $request->validate([
            'username' => ['required', 'min:5', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        User::create($validatedData);
        session()->flash('success', 'Registration Successfull! Please login');
        return Redirect('/login');
    }
}
