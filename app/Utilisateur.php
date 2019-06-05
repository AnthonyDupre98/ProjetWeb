<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model{

	protected $primaryKey ='idUtilisateur';

	protected $fillable = ['prenomUtilisateur','nomUtilisateur','dateNaissance','genre', 'villeNaissance', 'adresseActuelle', 'codePostal', 'mel', 'motDePasse'];
}