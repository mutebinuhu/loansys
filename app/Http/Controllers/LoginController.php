<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    //
     
    public function login(){
        return view('auth.login');
    }

    public function store(Request $request){
        $this->validate($request, [

                'email'=>'required',
                'password'=>'required'
        ]);
        if(!auth()->attempt($request->only('email', 'password'))){
            return back()->with('status', 'Invalid credentials');
        }

        return redirect()->route('index');

    }
}
