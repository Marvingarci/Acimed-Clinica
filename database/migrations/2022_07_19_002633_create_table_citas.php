<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->constrained('doctors')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string("nombre_paciente", 100);
            $table->string("dia", 50);
            $table->date("fecha");
            $table->time("hora");
            $table->string("estado", 1);
            $table->timestamps();

            $table->unique(['doctor_id','fecha','hora'], 'unicos_campos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_citas');
    }
}
