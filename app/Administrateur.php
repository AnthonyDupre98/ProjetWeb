<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;

class Administrateur extends Model
{
	protected $primaryKey ='idAdmin';

	protected $fillable = ['prenomAdmin','nomAdmin','dateNaissance','genre', 'villeNaissance', 'adresseActuelle', 'codePostal', 'mel', 'motDePasse', 'superAdmin'];

	/**
	* Get the password for the user.
	*
	* @return string
	*/
	public function getAuthPassword()
	{
	return $this->motDePasse;
	}
}
