<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class login_errores_emailTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function ventana()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    /**
     * @test
     *
     */
    public function email()
    {
        $response = $this->post(route('login'), [
            'email' => 1244.34,
            'password' => '123467',

        ]);
        $response->assertSessionHasErrors(['email']);
        $this->assertGuest();
    }

    /**
     * @test
     *
     */
    public function error_email()
    {
        $response = $this->post(route('login'), [
            'email' => null,
            'password' => '12345677',

        ]);
        $response->assertSessionHasErrors(['email']);
        $this->assertGuest();
    }

}
