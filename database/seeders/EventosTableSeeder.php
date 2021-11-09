<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EventosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eventos::factory()->count(0)->create();
        //
    }
}
