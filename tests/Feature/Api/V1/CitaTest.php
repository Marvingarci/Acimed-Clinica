<?php

namespace Tests\Feature\Api\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CitaTest extends TestCase
{
    //use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_obtener_citas()
    {
        $response = $this->get('api/v1/citas')
            ->assertJsonStructure(
                [
                    [
                        'id',
                        'doctor_id',
                        'nombre_paciente',
                        'dia',
                        'fecha',
                        'hora',
                        'estado',
                        'created_at',
                        'updated_at'
                    ]
                ]
            );

        $response->assertStatus(200);
    }

    public function test_crear_cita()
    {
        $cita = [
            'doctor_id' => '1',
            'nombre_paciente' => 'Anner David Mejia Amador',
            'dia' => 'sabado',
            'fecha' => '2021-08-17',
            'hora' => '08:00:00',
            'estado' => '1'
        ];

        $response = $this->post('/api/v1/citas', $cita);

        $response->assertStatus(200);
    }
}
