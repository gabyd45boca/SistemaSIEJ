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
        Schema::create('isas', function (Blueprint $table) {
           // $table->id();
           
            $table->bigIncrements('id');
             // Referencia al sumario original (puede ser NULL)
             $table->unsignedBigInteger('isa_original_id')->nullable();
             $table->unsignedInteger('version')->default(0); 

             //expediente  
             $table->string('num_dja')->unique();
             $table->string('num_dja_original')->nullable();//
             $table->string('lugar_proced')->nullable();
             $table->date('fecha_ingreso')->nullable();
             $table->string('num_dj')->nullable();
             $table->date('fecha_inicio')->nullable();
             $table->integer('fojas')->nullable();
             $table->string('deslindar_resp')->nullable();
            // $table->string('motivo'); //poner un select  filtrar por violencia de genero, accidente, arma, .. 
             $table->string('tipo_denun')->nullable();
             $table->date('fecha_movimiento')->nullable();
             $table->string('destino_pase')->nullable(); 
             $table->text('observaciones')->nullable();
             $table->string('elevado_por_instruccion')->nullable();//boolean
             $table->text('opinion_sede_inst')->nullable();
             $table->string('conversion_convalid')->nullable();//boolean

                         
             //personal instructor asuntos internos
             $table->string('apellido_nombre_DAI')->nullable();
             $table->string('leg_pers_DAI')->nullable();
             $table->string('dependen_DAI')->nullable(); //poner un select  filtrar por aqui las consultas     
             $table->string('jerarquia_DAI')->nullable(); //poner un select  filtrar por aqui las consultas             
             //carga movimientos asuntos internos
             $table->text('reg_interno_DAI')->nullable();
             $table->date('fecha_mov_proceDAI')->nullable();
             $table->text('destin_proceden_DAI')->nullable();
             $table->text('obs_proced_DAI')->nullable();
             $table->text('sugerencia_DAI')->nullable();
             $table->date('fecha_elev_inst_DAI')->nullable();
             $table->date('fecha_mov_paseDAI')->nullable();
             $table->string('destin_pase_DAI')->nullable();
             $table->string('obs_pase_DAI')->nullable();
             $table->string('concluido_DAI')->nullable();
 
             //personal instructor direccion asuntos judicales
             $table->string('apellido_nombre_DGAJ')->nullable();
             $table->string('leg_pers_DGAJ')->nullable();
             $table->string('dependen_DGAJ')->nullable(); //poner un select  filtrar por aqui las consultas        
             $table->string('jerarquia_DGAJ')->nullable(); //poner un select  filtrar por aqui las consultas           
             //carga movimientos direccion asuntos judicales
             $table->date('fecha_mov_proceDGAJ')->nullable();
             $table->text('destin_proced_DGAJ')->nullable();
             $table->text('sugerencia_DGAJ')->nullable();
             $table->text('obs_proced_DGAJ')->nullable();
             $table->date('fecha_mov_destDGAJ')->nullable();
             $table->string('destin_pase_DGAJ')->nullable();
             $table->string('obs_pase_DGAJ')->nullable();
             $table->string('concluido_DGAJ')->nullable();
 
             //personal instructor asesoria letrada
             $table->string('apellido_nombre_AL')->nullable();
             $table->string('leg_pers_AL')->nullable();
             $table->string('dependen_AL')->nullable(); //poner un select  filtrar por aqui las consultas        
             $table->string('jerarquia_AL')->nullable(); //poner un select  filtrar por aqui las consultas
             //carga movimientos asesoria letrada
             $table->text('reg_interno_AL')->nullable();
             $table->date('fecha_mov_procAL')->nullable();
             $table->text('destin_proceden_AL')->nullable();
             $table->text('sugerencia_AL')->nullable();
             $table->text('obs_proced_AL')->nullable();
             $table->date('fecha_mov_paseAL')->nullable();
             $table->string('destin_pase_AL')->nullable();
             $table->string('obs_pase_AL')->nullable();
             $table->string('concluido_AL')->nullable();
             
             //personal instructor direccion gral recursos humanos
             $table->string('apellido_nombre_DGRRHH')->nullable();
             $table->string('leg_pers_DGRRHH')->nullable();
             $table->string('dependen_DGRRHH')->nullable(); //poner un select  filtrar por aqui las consultas        
             $table->string('jerarquia_DGRRHH')->nullable(); //poner un select  filtrar por aqui las consultas
             //carga movimientos direccion gral recursos humanos
             $table->text('reg_interno_DGRRHH')->nullable();
             $table->date('fecha_mov_proceDGRRHH')->nullable();
             $table->text('destin_proceden_DGRRHH')->nullable();
             $table->text('resol_final_DGRRHH')->nullable();
             $table->text('obs_proced_DGRRHH')->nullable();
             $table->date('fecha_mov_paseDGRRHH')->nullable();
             $table->string('destin_pase_DGRRHH')->nullable();
             $table->string('obs_pase_DGRRHH')->nullable();
             $table->string('concluido_DGRRHH')->nullable();
             $table->string('DGRRHH_N°')->nullable();
             $table->date('fecha_notificacion')->nullable();

            // Llave foránea para asegurar que sumario_original_id se refiere a un sumario válido
            $table->foreign('isa_original_id')->references('id')->on('isas')->onDelete('cascade');                        
        
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
        Schema::dropIfExists('isas');
    }
};
