<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create(){
        // return view('sessions.create');
        return inertia('Auth/Login');
    }

    public function store(Request $request){

        $attributes = $request->validate([
            'email' => 'required|email|max:255|min:3',
            'password' => 'required|max:255|min:4'
        ]);

        if(auth()->attempt($attributes)){
            $request->session()->regenerate();
            return redirect()->intended(); 
            // return redirect('/')->with("success", "Welcome back!");
        }

        return back()
            ->withInput()
            ->withErrors(['email' => 'Invalid credentials!']);
    }
         
    public function destroy(){
        auth()->logout();
        return redirect('/');
   }
}