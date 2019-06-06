<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnexionController extends Controller
{
    public function formulaire(){
    	if (auth()->guest()){
        return view('connexion');
        }
        flash("Vous êtes déjà connecté(e).")->warning();
        return redirect('mon-compte');
    }

    public function traitement(){
    	request()->validate([
    		'email' => ['required', 'email'],
			'password' => ['required']
    	]);

    	$resultat = auth()->attempt([
    		'mel' => request('email'),
    		'password' => request('password'),
    	]);

    	if($resultat){
            flash('Vous êtes maintenant connecté(e).')->success();
    		return redirect('/mon-compte');
    	}

    	return back()->withInput()->withErrors([
    		'email' => 'Vos identifiants sont incorrects.'
    	]);
    }
}
