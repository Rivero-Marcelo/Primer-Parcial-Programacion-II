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

        return back()->withSuccess('El producto se ingreso con éxito.');


    }



    public function destroy($id){

        $producto = Producto::findOrFail($id);
        $producto->delete();

        return back()->withSuccess('Producto eliminado.');

 
    }


    public function showAll(){

        $productos = Producto::all();

        return view('Productos/ListadoProductos', ['productos' => $productos]);
        
    }






}
