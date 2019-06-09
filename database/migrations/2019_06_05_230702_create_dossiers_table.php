<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDossiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossiers', function (Blueprint $table) {
            $table->bigIncrements('idDossier');
            $table->integer('idUtilisateur')->unique();
            $table->string('resultatBac')->nullable();
            $table->string('carteDidentite')->nullable();
            $table->string('etatDossier');
            $table->string('prenomUtilisateur');
            $table->string('nomUtilisateur');
            $table->date('dateNaissance');
            $table->char('genre');
            $table->string('villeNaissance');
            $table->string('adresseActuelle');
            $table->integer('codePostal');
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
        Schema::dropIfExists('dossiers');
    }
}
