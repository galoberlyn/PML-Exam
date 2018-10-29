<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PizzaDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizza_details', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('pizza_id');
        $table->string('size', 100);
        $table->string('crust', 100);
        $table->string('type', 100);
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
        Schema::dropIfExists('pizza_details');
    }
}
