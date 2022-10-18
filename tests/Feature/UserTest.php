<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    

    public function test_mostrarVistaNuevoUsuario()
    {
        $response = $this->get(route('usuario.create'));

        $response->assertStatus(200);
    
    }


    public function test_crearUsuario()
    {

        $usuario = [
            'name' => 'Jose',
            'email' => 'jose@correo.com',
            'password' => 'password'
            
        ];

        $response = $this->post(route('usuario.store'), $usuario);
        $response->assertSessionHas('success', 'Usuario creado con éxito'); 
        $response->assertStatus(302);


    }


}
