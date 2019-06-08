<?php

namespace App\Http\Controllers;

use App\Utilisateur;
use App\Dossier;

class UtilisateursController extends Controller
{
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
