<?php

namespace Database\Factories;

use App\Models\Evento;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Evento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo'=> $this->faker->text,
            'descripcion' => $this->faker->text,
            'fecha' => $this->faker->dateTime,
            'hora' => $this->faker->time('H:i:s','now'),
            //
        ];
    }
}
