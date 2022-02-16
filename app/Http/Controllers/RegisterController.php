<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function create(){
        return view('auth.register');
    }

    public function store(Request $request){
         $this->validate($request,[
                    'name'=> 'required',
                    'email'=>'required|email',
                    'password'=>'required|confirmed'
            ]);


            User::create([

                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>Hash::make($request->password)
            ]);

            auth()->attempt($request->only('email','password'));
            return redirect()->route('index');

    }
}
