<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhizzaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phizza', function (Blueprint $table) {
            $table->increments('phizza_id');
            $table->string('phizza_name')->nullable(false);
            $table->longText('desc')->nullable(false);
            $table->integer('price')->nullable(false)->unsigned();
            $table->string('image')->nullable(false);
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
        Schema::dropIfExists('phizza');
    }
}
