<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Equipos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->String('N_Serie_Eq')->nullable();
            $table->String('Color_Eq')->nullable();
            $table->String('')->nullable();
            $table->String('')->nullable();
            $table->String('')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Equipos');
    }
}
