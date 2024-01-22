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
        Schema::create('infractor_isa', function (Blueprint $table) {
            //$table->id();

            $table->bigIncrements('id');
          

            //isa  
            $table->unsignedBigInteger('isa_id');
            $table->foreign('isa_id')->references('id')->on('isas')->onDelete('cascade');
              
            //$table->foreignId('isa_id')->nullable()->constrained->();

            //infractor   
            $table->unsignedBigInteger('infractor_id');
            $table->foreign('infractor_id')->references('id')->on('infractors')->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('infractor_isa');
    }
};
