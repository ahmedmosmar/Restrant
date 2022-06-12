<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResetModelsTable extends Migration
{

    public function up()
    {
        Schema::create('reset_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('final_price');
            $table->string('table_number');
            $table->bigInteger('weater_id' , false ,true)->nullable();
            $table->foreign('weater_id')->references('id')->on('weater_models');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('reset_models');

   }
}