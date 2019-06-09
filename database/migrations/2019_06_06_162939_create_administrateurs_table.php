<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministrateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrateurs', function (Blueprint $table) {
            $table->bigIncrements('idAdmin');
            $table->string('prenomAdmin');
            $table->string('nomAdmin');
            $table->date('dateNaissance');
            $table->char('genre');
            $table->string('villeNaissance');
            $table->string('adresseActuelle');
            $table->integer('codePostal');
            $table->string('mel')->unique();
            $table->string('motDePasse');
            $table->boolean('superAdmin');
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
        Schema::dropIfExists('administrateurs');
    }
}
