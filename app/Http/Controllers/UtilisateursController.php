<?php

namespace App\Http\Controllers;

use App\Utilisateur;

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

    	$utilisateur = Utilisateur::where('mel', $mel)->first();

    	return view('dossier', [
    		'utilisateur' => $utilisateur,
    	]);
    }
}
