<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class eventosTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function mostras_pagina_citas()
    {
        $response = $this->get('/citas');

        $response->assertStatus(302);
    }
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function mostras_calendario_evento()
    {
        $response = $this->get('/Evento/creado');

        $response->assertStatus(302);
    }
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function evento_crear()
    {
        $data = [
            'doctores'    =>  'hola',
            'fecha' =>  'fecha',
            'hora' =>  'diez',
            'motivo'  =>  'cita',
        ];
        $response = $this
        ->post(route('evento.guardar'), $data);
       $response->assertStatus(302);
    }
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function mostras_detalles_evento()
    {
        $response = $this->get('/Evento/details/{id}');

        $response->assertStatus(302);
    }
}
