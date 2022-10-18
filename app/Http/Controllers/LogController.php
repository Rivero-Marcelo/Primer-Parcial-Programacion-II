<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{

    public function index(){
        
        return view('login');
    }



    public function autenticar(Request $request) {

        $credenciales = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credenciales)) {    
            
            $request->session()->regenerate();
            
            return redirect()->route('home');
        }


        return redirect()->back()->with('error_login', 'Las credenciales no son válidas');
        
    }


    public function logout() {
        session()->flush();
        Auth::logout();

        return redirect()->route('login');
    }


 
}
