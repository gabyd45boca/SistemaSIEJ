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
            //$table->id();
            $table->bigIncrements('id');
            // Referencia al sumario original (puede ser NULL)
            $table->unsignedBigInteger('sumarisima_original_id')->nullable();
            $table->unsignedInteger('version')->default(0); 

            //expediente
            $table->string('num_dj')->unique();
            $table->string('num_dj_original')->nullable();
            $table->string('lugar_proced')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->integer('fojas')->nullable();
            $table->string('tipo_denuncia')->nullable();//poner un select para filtrar por aqui las consultas
          //  $table->string('motivo')->require();//poner un select para filtrar por aqui las consultas
            $table->text('primera_interv')->nullable();
            $table->date('fecha_pase')->nullable();
            $table->text('observaciones')->nullable();
            $table->string('lugar_pase')->nullable();
          
            //personal instructor direccion asuntos judicales
            $table->string('apellido_nombre_DGAJ')->nullable();
            $table->string('leg_pers_DGAJ')->nullable();
            $table->string('dependen_DGAJ')->nullable(); //poner un select  filtrar por aqui las consultas        
            $table->string('jerarquia_DGAJ')->nullable(); //poner un select  filtrar por aqui las consultas           
            //carga movimientos direccion asuntos judicales
            $table->date('fecha_reingreso_DGAJ')->nullable();
            $table->text('obs_reingreso_DGAJ')->nullable();
            $table->text('opinion_cierre_DGAJ')->nullable();
            $table->date('fecha_pase_DGAJ')->nullable();
            $table->text('lugar_pase_DGAJ')->nullable();
            $table->string('obs_pase_DGAJ')->nullable();
    
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

            //personal instructor secreteria gral
            $table->string('apellido_nombre_SS')->nullable();
            $table->string('leg_pers_SS')->nullable();
            $table->string('dependen_SS')->nullable(); //poner un select  filtrar por aqui las consultas        
            $table->string('jerarquia_SS')->nullable(); //poner un select  filtrar por aqui las consultas
            //carga movimientos secreteria gral
            $table->text('reg_interno_SS')->nullable();
            $table->date('fecha_proced_SS')->nullable();
            $table->text('lugar_proceden_SS')->nullable();
            $table->text('sugerencia_SS')->nullable();
            $table->text('obs_proced_SS')->nullable();
            $table->date('fecha_pase_SS')->nullable();
            $table->string('lugar_pase_SS')->nullable();
            $table->string('obs_pase_SS')->nullable();

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
            $table->string('concluido_DGRRHH')->nullable();
            $table->string('DGRRHH_N°')->nullable();
            $table->date('fecha_notificacion')->nullable();

            // Llave foránea para asegurar que parent_id se refiere a una sumarisima válida
            $table->foreign('sumarisima_original_id')->references('id')->on('sumarisimas')->onDelete('cascade');
                
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
