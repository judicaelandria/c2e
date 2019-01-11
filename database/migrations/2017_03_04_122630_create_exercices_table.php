<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExercicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom', 25);
            $table->mediumText('description');
            $table->boolean('valide')->default(false);
            $table->integer('nbr_vue')->unsigned()->default(0);
            $table->integer('type_d_exercice_id')->unsigned();
            $table->foreign('type_d_exercice_id')
                        ->references('id')
                        ->on('type_d_exercices')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                        ->references('id')
                        ->on('users')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
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
        Schema::drop('exercices');
    }
}
