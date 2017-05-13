<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUPlaysOnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('u_plays_ons', function (Blueprint $table) {
            $table->integer('u_id');
            $table->foreign('u_id')->references('id')->on('users');
            $table->integer('l_num');
            $table->foreign('l_num')->references('l_num')->on('levels');
            $table->integer('s_id');
            $table->foreign('s_id')->references('id')->on('states');
            $table->primary(array('u_id', 'l_num', 's_id'));
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
        Schema::dropIfExists('u_plays_ons');
    }
}
