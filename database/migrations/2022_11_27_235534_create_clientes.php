<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->String('Nombre_Cliente');
            $table->String('Apellido1_Cliente');
            $table->String('Apellido2_Cliente');
            $table->String('Direccion_Cliente');
            $table->String('Correo_Cliente');
            $table->String('Telefono_Cliente');
            $table->String('Rut_Cliente');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
