<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryModelsTable extends Migration
{

    public function up()
    {
        Schema::create('category_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category_name');
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('category_models');
    }
}