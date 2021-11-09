<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class login_errores_passwordTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function pagina_principal()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
    /**
     * @test
     *
     */
    public function password()
    {
        $response = $this->post(route('login'), [
            'email' => 'acimed@gmail.com',
            'password' => null,
        ]);
        $response->assertSessionHasErrors(['password']);
        $this->assertGuest();

    }

}
