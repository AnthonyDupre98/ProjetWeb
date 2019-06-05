<?php

namespace App\Http\Controllers;

use App\Utilisateur;

class InscriptionController extends Controller
{
    public function formulaire(){
    	return view('inscription');
    }

    public function traitement(){
    	request()->validate([
		'prenom' => ['required', 'string'],
		'nom' => ['required', 'string'],
		'datenaissance' => ['required'],
		'villenaissance' => ['required', 'string'],
		'adresseactuelle' => ['required', 'string'],
		'codepostal' => ['required', 'integer'],
		'email' => ['required', 'email'],
		'password' => ['required', 'confirmed'],
		'password_confirmation' => ['required']
	]);

	$utilisateur = Utilisateur::create([
	'prenomUtilisateur' => request('prenom'),
	'nomUtilisateur' => request('nom'),
	'dateNaissance' => request('datenaissance'),
	'genre' => request('genre'),
	'villeNaissance' => request('villenaissance'),
	'adresseActuelle' => request('adresseactuelle'),
	'codePostal' => request('codepostal'),
	'mel' => request('email'),
	'motDePasse' => bcrypt(request('password'))]);
    return 'Formulaire reçu';
    }
}
