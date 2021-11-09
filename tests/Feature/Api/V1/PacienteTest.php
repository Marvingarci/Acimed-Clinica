<?php

namespace Tests\Feature\Api\V1;

use App\Models\Paciente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PacienteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test
     */

    //use RefreshDatabase;


    public function test_obtener_pacientes(){

        $response = $this->get('/api/v1/pacientes');

        $response->assertStatus(200);

    }

    public function test_guardar_paciente()
    {
        $paciente = [
            'nombres' => 'Anner David',
            'apellidos' => 'Mejia Amador',
            'email' => 'anner@gamil.com',
            'identidad' => '9878191788654',
            'direccion' => 'Danli, El Paraiso',
            'telefono' => '78564532'
        ];

        $response = $this->post('/api/v1/pacientes', $paciente);

        $response->assertStatus(200);
    }
}
