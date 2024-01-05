<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();

            $table->string('num_orden_exp')->unique();
            $table->date('fecha_ingreso_exp');
            $table->string('origen_exp');//poner un select filtrar por dependencia
            $table->string('tipo_exp'); //poner un select  filtrar por tipo 
            $table->integer('fojas_exp');
            $table->string('procedencia_exp');//poner un select filtrar por dependencia
            $table->string('iniciador_exp'); 
            $table->text('extracto_exp');
            $table->date('fecha_salida_exp'); 
            $table->string('destino_exp'); //poner un select filtrar por dependencia
            $table->text('observaciones_exp')->nullable();

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
        Schema::dropIfExists('expedientes');
    }
};
