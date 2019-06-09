<?php

namespace App\Http\Controllers;

use App\Utilisateur;

class InscriptionController extends Controller
{
    public function formulaire(){
    	if (auth()->guest()){
    	return view('inscription');
    	}
    	flash("Vous êtes déjà connecté(e)")->warning();
    	return redirect('mon-compte');
    }

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
