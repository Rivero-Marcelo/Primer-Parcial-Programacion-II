<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function create(){

        return view('Productos/AltaProducto');

    }



    public function store(Request $request){

        $request -> validate([
            'nombre' => 'required',
            'marca' => 'required',
            'descripcion' => 'required',
            'stock' => 'required'
        ]);


        $producto = Producto::create([

            'nombre' => $request->nombre,
            'marca' => $request->marca,
            'descripcion' => $request->descripcion,
            'stock' => $request->stock

        ]);


    }



    public function destroy($id){
        
    }






}
