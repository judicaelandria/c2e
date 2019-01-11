<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaires', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('phrase');
            $table->boolean('reponse')->default(false);
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')
                        ->references('id')
                        ->on('users')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
            $table->integer('forum_id')->unsigned()->index();
            $table->foreign('forum_id')
                        ->references('id')
                        ->on('forums')
                        ->onDelete('cascade')
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
        Schema::drop('commentaires');
    }
}
