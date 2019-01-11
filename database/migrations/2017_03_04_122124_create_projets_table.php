<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom',25);
            $table->mediumText('description');
            $table->integer('nbr_vue')->unsigned()->default(1);
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
        Schema::drop('projets');
    }
}
