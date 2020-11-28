<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrTransactionDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_transaction_detail', function (Blueprint $table) {
            $table->increments('transaction_detail_id');
            $table->integer('transaction_id')->unsigned();
            $table->integer('phizza_id')->unsigned();
            $table->integer('quantity')->unsigned()->nullable(false);
            $table->foreign('transaction_id')->references('transaction_id')->on('tr_transaction')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('phizza_id')->references('phizza_id')->on('phizza')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('tr_transaction_detail');
    }
}
