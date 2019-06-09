<?php

namespace App\Http\Controllers;

use App\Utilisateur;

class InscriptionController extends Controller
{
    //renvoie au formulaire d'inscription d'un utilisateur
    public function formulaire(){
    	return view('inscription');
    }

    //permet d'ajouter les données du formulaire a la table utilisateurs
    public function traitement(){
    	request()->validate([
		'email' => ['required', 'email'],
		'password' => ['required', 'confirmed'],
		'password_confirmation' => ['required']
	]);

	$utilisateur = Utilisateur::create([
	'mel' => request('email'),
	'motDePasse' => bcrypt(request('password'))]);
	
	flash('Votre compte a été créé !')->success();
    return redirect('/connexion');
    }
}
