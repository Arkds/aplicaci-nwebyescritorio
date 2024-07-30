<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('persona_id');
            $table->enum('tipo_persona', ['estudiante', 'docente']);
            $table->timestamp('hora_llegada')->nullable();
            $table->timestamp('hora_salida')->nullable();
            $table->timestamps();

            $table->unique(['persona_id', 'tipo_persona', 'hora_salida']);
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistencias');
    }
};
