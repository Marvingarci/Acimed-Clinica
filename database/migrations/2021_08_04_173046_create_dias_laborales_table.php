<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiasLaboralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dias_laborales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('doctor_id')->constrained('doctors')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->boolean('lunes')->default(false);
            $table->boolean('martes')->default(false);
            $table->boolean('miercoles')->default(false);
            $table->boolean('jueves')->default(false);
            $table->boolean('viernes')->default(false);
            $table->boolean('sabado')->default(false);
            $table->boolean('domingo')->default(false);
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
        Schema::dropIfExists('dias_laborales');
    }
}
