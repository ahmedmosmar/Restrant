<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeModelsTable extends Migration
{

    public function up()
    {
        Schema::create('type_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id' , false ,true);
            $table->foreign('category_id')->references('id')->on('category_models');
            $table->string('type_name');
            $table->float('price_sale');
            // $table->float('price_cost');
            // $table->string('time_make');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('type_models');
    }
}