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
        Schema::create('sumarisimas', function (Blueprint $table) {
            $table->id();
            //expediente
            $table->string('num_dj')->unique();
            $table->date('fecha_ingreso');
            $table->integer('fojas');
            $table->string('tipo_denuncia')->require();//poner un select para filtrar por aqui las consultas
            $table->string('motivo')->require();//poner un select para filtrar por aqui las consultas
            $table->string('destino_proced');

            /*personal infractor 
            $table->string('apellido_inf');
            $table->string('nombre_inf');
            $table->string('leg_pers_inf');
            $table->string('dependen_inf'); //poner un select  filtrar por aqui las consultas
            $table->string('jerarquia_inf'); //poner un select  filtrar por aqui las consultas//personal infractor
            $table->string('retirado')->nullable();
            $table->string('detenido')->nullable();
            $table->string('dispon_prev')->nullable();
            $table->string('levant_dispon_prev')->nullable();
            $table->date('fecha_disp_prevent')->nullable();
            $table->date('fecha_levan_disp_prev')->nullable();
            $table->string('resol_disp_prev')->nullable();
            $table->string('resol_levan_disp_prev')->nullable();*/

            //personal instructor asuntos legales
            $table->string('apellido_nombre_AL')->nullable(); 
            $table->string('leg_pers_AL')->nullable();
            $table->string('jerarquia_AL')->nullable(); //poner un select  filtrar por aqui las consultas
            $table->string('dependen_AL')->nullable(); //poner un select  filtrar por aqui las consultas   
            
           //carga de la sugerencia 
            $table->date('fecha_mov')->nullable();
            $table->string('destino_pase')->nullable();
            $table->text('primera_interv')->nullable();
            $table->string('tipo_mov')->nullable();
            $table->text('observaciones')->nullable();
            $table->date('fecha_reingreso')->nullable();
            $table->text('opinion_final')->nullable();
            $table->date('fecha_egreso')->nullable();
            
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
        Schema::dropIfExists('sumarisimas');
    }
};
