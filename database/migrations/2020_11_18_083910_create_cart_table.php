<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->increments('item_id');
            $table->integer('quantity');
            $table->integer('user_id')->unsigned();
            $table->integer('phizza_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('ms_user');
            $table->foreign('phizza_id')->references('phizza_id')->on('phizza');
            $table->rememberToken();
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
        Schema::dropIfExists('cart');
    }
}
