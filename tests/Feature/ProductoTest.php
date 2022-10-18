<?php

namespace Tests\Feature;

use App\Http\Middleware\Autenticar;
use App\Models\Producto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ProductoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    //use RefreshDatabase;
  

    public function test_crearProducto()
    {

        $user = User::factory()->create();

        $producto = [
            'nombre' => 'un nombre',
            'marca' => 'una marca',
            'descripcion' => 'una descripcion',
            'stock' => 12
        ];

        $response = $this->actingAs($user)->post(route('producto.store'), $producto);
        $response->assertSessionHas('success', 'El producto se ingreso con éxito.');
        $this->assertDatabaseCount('productos', 1);
        $this->assertDatabaseHas('productos', [
            'nombre' => 'un nombre',
            'marca' => 'una marca',
            'descripcion' => 'una descripcion',
            'stock' => 12
        ]);

        
         
    }

    public function test_eliminarProducto()
    {

        $user = User::factory()->create();
        $producto =  Producto::factory()->create();

        $response = $this->actingAs($user)->get('/producto/eliminar/'. $producto->id);
        $response->assertSessionHas('success', 'Producto eliminado.');

    }






}
