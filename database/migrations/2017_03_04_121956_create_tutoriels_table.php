<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorielsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutoriels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom', 50);
            $table->string('description',300);
            $table->mediumText('introduction');
            $table->integer('nbr_vue')->unsigned()->default(1);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                        ->references('id')
                        ->on('users')
                        ->onDelete('cascade');
            $table->integer('niveau_id')->unsigned();
            $table->foreign('niveau_id')
                        ->references('id')
                        ->on('niveaus');
            $table->timestamps();
        });
        Schema::table('tutoriels', function (Blueprint $table){
            $table->integer('validation_id')->unsigned()->index();
            $table->integer('badget_id')->unsigned()->index();
            /*$table->foreign('validateur_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tutoriels', function(Blueprint $table) {
            $table->dropForeign('tutoriels_user_id_foreign');
        });
        Schema::drop('tutoriels');
    }
}
