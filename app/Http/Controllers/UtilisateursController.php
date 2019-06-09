<?php

namespace App\Http\Controllers;

use App\Utilisateur;
use App\Dossier;

class UtilisateursController extends Controller
{
    //renvoie la vue avec tous les utilisateurs, leur mail et l'etat de le dossier
    public function liste()
    {
    	$dossiers= [];
    	$utilisateurs = Utilisateur::all();
    	foreach($utilisateurs as $utilisateur){
    		if(Dossier::where('idUtilisateur', $utilisateur->idUtilisateur)->exists()){
        		$dossiers[] = Dossier::where('idUtilisateur', $utilisateur->idUtilisateur)->firstOrFail();
        	}else{
        		$dossiers[] = null;
        	}
    	}

		return view('utilisateurs', [
			'utilisateurs'=> $utilisateurs,
			'dossiers' => $dossiers,
		]);
    }
}
