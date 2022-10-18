<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Support\Str;



class LoginTest extends TestCase
{
  //  use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_mostrarVistaLoginGet()
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
        
    
    }

    public function test_mostrarVistaLoginPost()
    {
        $response = $this->post(route('login'));

        $response->assertStatus(302);
       
    
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


    public function test_autenticarUsuario()
    {

        $user = User::factory()->create();

        $response = $this->post(route('login'), ['email' => $user->email, 'password' => 'password']);

        
        $response->assertStatus(302);
        $response->assertRedirect(route('home'));
        $this->assertAuthenticatedAs($user);
        


    }






}
