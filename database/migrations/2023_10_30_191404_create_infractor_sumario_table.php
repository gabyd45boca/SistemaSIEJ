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
        Schema::create('infractor_sumario', function (Blueprint $table) {
            //$table->id();

            $table->bigIncrements('id');
          

             //sumario  
             $table->unsignedBigInteger('sumario_id');
             $table->foreign('sumario_id')->references('id')->on('sumarios')->onDelete('cascade');
               
             //$table->foreignId('sumario_id')->nullable()->constrained->();

             //infractor   
             $table->unsignedBigInteger('infractor_id');
             $table->foreign('infractor_id')->references('id')->on('infractors')->onDelete('cascade');
 
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
        Schema::dropIfExists('infractor_sumario');
    }
};
