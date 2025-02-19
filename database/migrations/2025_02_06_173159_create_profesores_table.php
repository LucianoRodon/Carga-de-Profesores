<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesoresTable extends Migration
{
    public function up()
    {
        // Asegúrate de que localidades exista primero
        if (!Schema::hasTable('localidades')) {
            Schema::create('localidades', function (Blueprint $table) {
                $table->id('id_localidad');
                $table->string('localidad')->unique();
                $table->timestamps();
            });
        }

        Schema::create('profesores', function (Blueprint $table) {
            $table->id();
            $table->string('dni')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email')->unique();
            $table->string('telefono');
            $table->string('genero');
            $table->date('fecha_nacimiento');
            $table->text('direccion');
            $table->text('estudios')->nullable();
            $table->text('experiencia')->nullable();
            $table->string('profesion')->nullable();
            $table->string('disponibilidad_horaria')->nullable();
            $table->enum('estado', ['Activo', 'Inactivo'])->default('Activo');
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedBigInteger('id_localidad')->nullable();
            $table->foreign('id_localidad')
                ->references('id_localidad')
                ->on('localidades')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('profesores');
        Schema::dropIfExists('localidades');
    }
}
