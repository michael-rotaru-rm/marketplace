<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create(){
        return view('sessions.create');
    }

    public function store(){

        $attributes = request()->validate([
            'email' => 'required|email|max:255|min:3',
            'password' => 'required|max:255|min:4'
        ]);

        if(auth()->attempt($attributes)){
            session()->regenerate();
            return redirect('/')->with("success", "Welcome back!");
        }

        return back()
            ->withInput()
            ->withErrors(['email' => 'Invalid credentials!']);
    }
        
    public function destroy(){
        auth()->logout();
        return redirect('/')->with('success','Goodbye!');
   }
}