<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_doctor');
            $table->string('apellido_doctor');
            $table->string('identidad')->unique();
            $table->string('email')->unique();
            $table->string('direccion');
            $table->string('telefono');
            $table->time('hora_inicio');
            $table->time('hora_final');
            $table->string('especialidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
