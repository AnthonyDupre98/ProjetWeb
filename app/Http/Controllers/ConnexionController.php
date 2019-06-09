<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnexionController extends Controller
{
    //renvoie au formulaire de connexion d'un utilisateur ou d'un admin
    public function formulaire(){
        return view('connexion');
    }

    //permet de connecter un utilisateur ou un admin
    public function traitement(){
    	request()->validate([
    		'email' => ['required', 'email'],
			'password' => ['required']
    	]);

    	$resultat = auth()->attempt([
    		'mel' => request('email'),
    		'password' => request('password'),
    	]);

        $resultat2 = auth()->guard('admin')->attempt([
            'mel' => request('email'),
            'password' => request('password'),
        ]);

    	if($resultat){
            flash('Vous êtes maintenant connecté(e).')->success();
    		return redirect('/mon-compte');
    	}elseif ($resultat2){
            flash('Vous êtes maintenant connecté(e).')->success();
            return redirect('/mon-compte-admin');
        }

    	return back()->withInput()->withErrors([
    		'email' => 'Vos identifiants sont incorrects.'
    	]);
    }
}
