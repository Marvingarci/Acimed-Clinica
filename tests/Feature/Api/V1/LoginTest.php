<?php

namespace Tests\Feature\Api\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
class LoginTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->make([
            'nombre' =>'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt("admin"),
            'identidad' => '0000000000000',
            'is_admin' => 1
        ]);
    }
    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function test_Log_in_view()
    {
        $response = $this->post('api/v1/login', [
            'identidad' => '0000000000000',
            'password' => 'admin'
        ]);

        $response->assertStatus(200);
    }


}
