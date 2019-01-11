<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentaireTutorielsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaire_tutoriels', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('phrase');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                        ->references('id')
                        ->on('users')
                        ->onDelete('restrict')
                         ->onUpdate('restrict');
            $table->integer('tutoriel_id')->unsigned();
            $table->foreign('tutoriel_id')
                        ->references('id')
                        ->on('tutoriels')
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
        Schema::drop('commentaire_tutoriels');
    }
}
