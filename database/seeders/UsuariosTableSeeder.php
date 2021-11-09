<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->nombre ="admin";
        $user->email ="admin@gmail.com";
        $user->password = bcrypt("admin");
        $user->identidad = "0000000000000";
        $user->is_admin = 1;
        $user->save();
    }
}
