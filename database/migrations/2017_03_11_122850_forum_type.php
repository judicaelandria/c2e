<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForumType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_type', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('forum_id')->unsigned();
            $table->foreign('forum_id')
                        ->references('id')
                        ->on('forums')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')
                        ->references('id')
                        ->on('types')
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
          Schema::drop('forum_type');
    }
}
