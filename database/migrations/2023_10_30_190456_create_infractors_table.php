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
        Schema::create('infractors', function (Blueprint $table) {
            //$table->id();

            $table->bigIncrements('id');

            $table->string('apellido_nombre_inf');
            $table->string('leg_pers_inf')->unique();
            $table->string('dependen_inf'); //poner un select  filtrar por aqui las consultas
            $table->string('jerarquia_inf'); //poner un select  filtrar por aqui las consultas
            $table->string('retirado')->nullable();
            $table->string('detenido')->nullable();
            $table->string('dispon_prev')->nullable();
            $table->string('levan_disp_prev')->nullable();
            $table->date('fecha_disp_prev')->nullable();
            $table->date('fecha_lev_disp_prev')->nullable();
            $table->string('resol_disp_prev')->nullable();
            $table->string('resol_levan_disp_prev')->nullable();
            
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
        Schema::dropIfExists('infractors');
    }
};
