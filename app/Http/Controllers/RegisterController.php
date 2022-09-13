<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        return inertia('Auth/Register');
    }

    public function store(Request $request){

        $attributes = $request->validate([
            'name' => 'required|max:255|min:3',
            'username' => 'required|max:255|min:3',
            'email' => 'required|email|max:255|min:3',
            'password' => 'required|max:255|min:4'
        ]);

        $user = User::create($attributes);

        auth()->login($user);
        
        session()->flash('success',"Your account has been created");

        return redirect('/');
    }
}
