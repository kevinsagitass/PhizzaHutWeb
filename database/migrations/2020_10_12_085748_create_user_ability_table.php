<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAbilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_user_ability', function (Blueprint $table) {
            $table->id('user_ability_id');
            $table->integer('role_id')->unsigned();
            $table->string('task');
            $table->timestamps();

            $table->foreign('role_id')->references('role_id')->on('ms_roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_ability');
    }
}
