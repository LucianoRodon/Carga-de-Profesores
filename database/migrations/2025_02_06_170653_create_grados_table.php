<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('grados', function (Blueprint $table) {
            $table->bigIncrements('id_grado');
            $table->unsignedBigInteger('id_carrera'); // Añadir esta línea
            $table->integer('grado');
            $table->string('division');
            $table->string('detalle');
            $table->integer('capacidad');
            $table->timestamps();

            // Añadir esta restricción de clave foránea
            $table->foreign('id_carrera')
                  ->references('id_carrera')
                  ->on('carreras')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('grados');
    }
};
