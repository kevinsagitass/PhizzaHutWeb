<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_transaction', function (Blueprint $table) {
            $table->increments('transaction_id');
            $table->integer('user_id')->unsigned();
            $table->dateTime('transaction_date')->nullable(false);
            $table->integer('payment_ammount')->unsigned()->nullable(false);
            $table->foreign('user_id')->references('user_id')->on('ms_user');
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
        Schema::dropIfExists('tr_transaction');
    }
}
