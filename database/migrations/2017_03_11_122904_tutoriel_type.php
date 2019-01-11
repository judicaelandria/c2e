<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TutorielType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutoriel_type', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tutoriel_id')->unsigned();
            $table->foreign('tutoriel_id')
                        ->references('id')
                        ->on('tutoriels')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')
                        ->references('id')
                        ->on('types')
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
          Schema::drop('tutoriel_type');
    }
}
