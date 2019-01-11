<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('name',30);
            $table->string("prenom", 30);
            $table->integer('annee_nais')->unsigned();
            $table->string('adresse',150);
            $table->string('email')->unique();
            $table->string('login',30)->unique();
            $table->string('telephone',13);
            $table->string('image', 50);
            $table->string('domaine', 50)->default('');
            $table->boolean('etudiant')->default(true);
            $table->string('lieu', 70);
            $table->string('password',255);
            $table->boolean('pass_changed')->default(false);
            $table->string('statut');
            //$table->mediumText('motif_insrciption');
            //$table->date('date_activation')->nullable();
            //$table->tinyInteger('nombre_de_connection')->default(1);
            //$table->string('taille_ecran',60)->nullable();
            //$table->string('nom_appareil',60)->nullable();
            //$table->boolean('mode_economique')->default(false);
            //$table->boolean('connecter')->default(false);
            //$table->tinyInteger('nbr_vue')->default(0);
            //$table->boolean('confirmed')->default(false);

            /*$table->integer('domain_id')->unsigned();
            $table->foreign('domain_id')
                        ->references('id')
                        ->on('domains')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');*/

            $table->integer('type_utilisateur_id')->unsigned();
            $table->foreign('type_utilisateur_id')
                        ->references('id')
                        ->on('type_utilisateurs')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');

            $table->integer('score')->unsigned()->default(1);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
