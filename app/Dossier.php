<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    protected $primaryKey ='idDossier';

	protected $fillable = ['idUtilisateur', 'resultatBac','carteDidentite', 'etatDossier', 'prenomUtilisateur','nomUtilisateur','dateNaissance','genre', 'villeNaissance', 'adresseActuelle', 'codePostal'];

}
