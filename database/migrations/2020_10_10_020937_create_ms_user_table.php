<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_user', function (Blueprint $table) {
            $table->id()->increment();
            $table->string('username')->nullable(false);
            $table->string('email')->nullable(false);
            $table->string('pass')->nullable(false);
            $table->string('confirm_pass')->nullable(false);
            $table->string('address')->nullable(false);
            $table->string('phone_number')->nullable(false);
            $table->string('gender')->nullable(false);
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
        Schema::dropIfExists('ms_user');
    }
}
