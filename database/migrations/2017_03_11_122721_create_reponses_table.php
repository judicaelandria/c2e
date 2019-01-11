<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reponses', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('phrase');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                        ->references('id')
                        ->on('users')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
            $table->integer('question_id')->unsigned();
            $table->foreign('question_id')
                        ->references('id')
                        ->on('questions')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
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
        Schema::drop('reponses');
    }
}
