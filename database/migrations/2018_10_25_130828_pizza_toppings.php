<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PizzaToppings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizza_toppings', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('order_id');
        $table->integer('pizza_id');
        $table->integer('pizza_area');
        $table->string('pizza_item', 100);
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
        Schema::dropIfExists('pizza_toppings');
    }
}
