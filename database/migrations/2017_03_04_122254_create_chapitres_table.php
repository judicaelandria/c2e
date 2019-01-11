<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChapitresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapitres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom',25);
            $table->mediumText('description');
            $table->integer('tutoriel_id')->unsigned();
            $table->foreign('tutoriel_id')
                        ->references('id')
                        ->on('tutoriels')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
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
        Schema::drop('chapitres');
    }
}
