<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class doctores_crearTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function mostrar_pagina_crear()
    {
        $response = $this->get('/doctores/nuevo');
        $response->assertStatus(302);

    }
    
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function pagina_doctor_creados()
    {
        $response = $this->get(route('doctores'));
        $response->assertStatus(302);

    }

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function editar_doctores()
    {
        $response = $this->get('/doctores/editar/{id}');
        $response->assertStatus(302);

    }



}
