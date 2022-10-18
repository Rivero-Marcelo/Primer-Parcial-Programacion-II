<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_mostrarVistaLogin()
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
        $response->assertViewIs('login');
    
    }

    public function test_validarDatosEnVistaLogin()
    {

        $password = Str::random(3);
        $email = Str::random(5) . '@' . Str::random(5) . ".com";


        $response = $this->post(route('login'), ['email' => $email, 'password' => $password]);
         
        $response->assertSessionHasNoErrors();

    }


    public function test_generarErroresDeValidacionEnVistaLogin()
    {
        
        $response = $this->post(route('login'), []);

        $response->assertSessionHasErrors('email');
        $response->assertSessionHasErrors('password');

    }






}
