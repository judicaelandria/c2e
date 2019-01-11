<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TermeInscrit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terme_inscrit', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('terme_id')->unsigned();
            $table->foreign('terme_id')->references('id')->on('termes');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('terme_inscrit');    
    }
}
