<?php

namespace Tests\Feature\Api\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DoctoresTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_mostrar_doctores()
    {
        $response = $this->get('/api/v1/doctores');

        $response->assertStatus(200);
    }

    public function test_obtener_doctor()
    {
        $response = $this->get('/api/v1/doctores/1');

        $response->assertStatus(200);
    }

    public function test_guardar_pacientes()
    {
        $response = $this->post('api/v1/doctores', [
            'nombre_doctor' => 'Luis',
            'apellido_doctor' => 'Garcia',
            'identidad' => '0808199800089',
            'email' => 'luis@una.un',
            'direccion' => 'Cuyali',
            'telefono' => '98897656',
            'especialidad' => 'Medico General',
            'hora_inicio' => '09:12',
            'hora_final' => '07:12 '
        ]);

        $response->assertStatus(201);
    }
}
