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
        Schema::create('sumario_tipo_denuncia', function (Blueprint $table) {
            //$table->id();
            $table->bigIncrements('id');

            //sumario  
            $table->unsignedBigInteger('sumario_id');
            $table->foreign('sumario_id')->references('id')->on('sumarios')->onDelete('cascade');
                
            //tipo_denuncias   
            $table->unsignedBigInteger('tipo_denuncia_id');
            $table->foreign('tipo_denuncia_id')->references('id')->on('tipo_denuncias')->onDelete('cascade');

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
        Schema::dropIfExists('sumario_tipo_denuncia');
    }
};
