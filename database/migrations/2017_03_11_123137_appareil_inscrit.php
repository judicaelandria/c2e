<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppareilInscrit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appareil_inscrit', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('appareil_id')->unsigned();
            $table->foreign('appareil_id')->references('id')->on('appareils');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::drop('appareil_inscrit');
    }
}
