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
        Schema::create('motivo_sumario', function (Blueprint $table) {
           //$table->id();
           $table->bigIncrements('id');
          

           //sumario  
           $table->unsignedBigInteger('sumario_id');
           $table->foreign('sumario_id')->references('id')->on('sumarios')->onDelete('cascade');
             
           //motivo   
           $table->unsignedBigInteger('motivo_id');
           $table->foreign('motivo_id')->references('id')->on('motivos')->onDelete('cascade');

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
        Schema::dropIfExists('motivo_sumario');
    }
};