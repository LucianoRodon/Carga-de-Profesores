<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('unidad_curricular', function (Blueprint $table) {
            $table->bigIncrements('id_uc');
            $table->string('unidad_curricular');
            $table->integer('horas_sem');
            $table->integer('horas_anual');
            $table->string('formato');
            $table->string('tipo')->nullable()->comment('Tipo de unidad curricular');
            $table->string('fs')->nullable()->comment('Formato de seguimiento');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('unidad_curricular');
    }
};
