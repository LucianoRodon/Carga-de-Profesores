<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Asegúrate de que estas tablas existan antes
        Schema::create('carreras', function (Blueprint $table) {
            $table->bigIncrements('id_carrera');
            $table->string('carrera')->unique();
            $table->integer('cupo');
            $table->timestamps();
        });

        Schema::create('grados', function (Blueprint $table) {
            $table->bigIncrements('id_grado');
            $table->unsignedBigInteger('id_carrera');
            $table->integer('grado');
            $table->string('division');
            $table->string('detalle');
            $table->integer('capacidad');
            $table->timestamps();

            $table->foreign('id_carrera')
                  ->references('id_carrera')
                  ->on('carreras')
                  ->onDelete('cascade');
        });

        Schema::create('unidad_curricular', function (Blueprint $table) {
            $table->bigIncrements('id_uc');
            $table->string('unidad_curricular');
            $table->string('tipo');
            $table->integer('horas_sem');
            $table->integer('horas_anual');
            $table->string('formato');
            $table->timestamps();
        });

        Schema::create('profesor_unidad_curricular', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profesor_id');
            $table->unsignedBigInteger('id_carrera');
            $table->unsignedBigInteger('id_grado');
            $table->unsignedBigInteger('id_uc');
            $table->timestamps();

            // Foreign keys
            $table->foreign('profesor_id')->references('id')->on('profesores')->onDelete('cascade');
            $table->foreign('id_carrera')->references('id_carrera')->on('carreras')->onDelete('cascade');
            $table->foreign('id_grado')->references('id_grado')->on('grados')->onDelete('cascade');
            $table->foreign('id_uc')->references('id_uc')->on('unidad_curricular')->onDelete('cascade');

            // Unique constraint to prevent duplicate assignments
            $table->unique(['profesor_id', 'id_carrera', 'id_grado', 'id_uc']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profesor_unidad_curricular');
        Schema::dropIfExists('unidad_curricular');
        Schema::dropIfExists('grados');
        Schema::dropIfExists('carreras');
    }
};