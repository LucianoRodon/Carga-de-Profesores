<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalidadesTable extends Migration
{
    public function up()
    {
        Schema::create('localidades', function (Blueprint $table) {
            $table->id('id_localidad');
            $table->string('localidad')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('localidades');
    }
}
