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
            //$table->id();
            $table->bigIncrements('id');
            // Referencia al sumario original (puede ser NULL)
            $table->unsignedBigInteger('expediente_original_id')->nullable();
            $table->unsignedInteger('version')->default(0); 

            /////////
            $table->string('num_orden_exp')->unique();
            $table->string('num_orden_exp_original')->nullable();
            $table->date('fecha_ingreso_exp')->nullable();
            $table->string('origen_exp')->nullable();//poner un select filtrar por dependencia
            $table->string('tipo_exp')->nullable(); //poner un select  filtrar por tipo 
            $table->integer('fojas_exp')->nullable();
            $table->string('procedencia_exp')->nullable();//poner un select filtrar por dependencia
            $table->string('iniciador_exp')->nullable(); 
            $table->text('extracto_exp')->nullable();
            $table->date('fecha_salida_exp')->nullable(); 
            $table->string('destino_exp')->nullable(); //poner un select filtrar por dependencia
            $table->text('observaciones_exp')->nullable();

            // Llave foránea para asegurar que expedientes_original_id se refiere a un expediente válido
            $table->foreign('expediente_original_id')->references('id')->on('expedientes')->onDelete('cascade');

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
