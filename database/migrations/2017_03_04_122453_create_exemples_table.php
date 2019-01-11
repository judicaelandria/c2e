<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExemplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exemples', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre',25);
            $table->string('exemple',255);
            $table->integer('section_id')->unsigned();
            $table->foreign('section_id')
                        ->references('id')
                        ->on('sections')
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
        Schema::drop('exemples');
    }
}
