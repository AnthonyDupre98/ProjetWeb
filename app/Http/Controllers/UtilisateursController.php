<?php

namespace App\Http\Controllers;

use App\Utilisateur;
use App\Dossier;

class UtilisateursController extends Controller
{
    public function liste()
    {
    	$utilisateurs = Utilisateur::all();

		return view('utilisateurs', [
			'utilisateurs'=> $utilisateurs,
		]);
    }

    public function voirDossier(){
    	$mel = request('mel');

    	$utilisateur = Utilisateur::where('mel', $mel)->firstOrFail();
        $dossier = null;

        if(Dossier::where('idUtilisateur', $utilisateur->idUtilisateur)->exists()){
        $dossier = Dossier::where('idUtilisateur', $utilisateur->idUtilisateur)->firstOrFail();        
        }

    	return view('dossier', [
    		'utilisateur' => $utilisateur,
            'dossier' => $dossier,
    	]);
    }
}
