<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('type_id' , false ,true);
            $table->foreign('type_id')->references('id')->on('type_models');

            $table->bigInteger('reset_id' , false ,true)->nullable();
            $table->foreign('reset_id')->references('id')->on('reset_models');

            $table->string('type_amount');
            $table->string('type_price');
            $table->string('sales_table');
            $table->string('status');
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
        Schema::dropIfExists('orders_models');
    }
}
