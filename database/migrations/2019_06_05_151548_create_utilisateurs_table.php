<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->bigIncrements('idUtilisateur');
            $table->string('prenomUtilisateur', 100);
            $table->string('nomUtilisateur', 100);
            $table->date('dateNaissance');
            $table->char('genre');
            $table->string('villeNaissance');
            $table->string('adresseActuelle');
            $table->integer('codePostal');
            $table->string('mel')->unique();
            $table->string('motDePasse');
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
        Schema::dropIfExists('utilisateurs');
    }
}
