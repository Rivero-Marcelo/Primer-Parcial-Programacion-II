<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;




class UserController extends Controller
{
    
    public function create(){

        return view('Users/nuevoUsuario');

    }



    public function store(Request $request){

        $request->validate([
            'email' => 'bail|required|string|email|unique:users',
            'password' => 'required|string|min:3',
            'name' => 'required|string|max:50',       
        ]);
        
        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'name' => $request->name,
            
        ]);

        //Auth::login($user);
        return back()->withSuccess('Usuario creado con éxito');
    }



    }


