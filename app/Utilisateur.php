<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;

class Utilisateur extends Model implements Authenticatable{

	use BasicAuthenticatable;

	protected $primaryKey ='idUtilisateur';

	protected $fillable = ['mel', 'motDePasse'];

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