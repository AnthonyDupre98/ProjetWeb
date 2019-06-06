<?php

namespace App\Http\Controllers;

use App\Dossier;
use App\Utilisateur;

class DossierController extends Controller
{
	public function dossier(){
		request()->validate([
		    'resultatBac' => ['required', 'image'],
		    'carteDidentite' => ['required', 'image'],
		]);

		$path1 = request('resultatBac')->store('resultatsBac', 'public');
		$path2 = request('carteDidentite')->store('cartesDidentite', 'public');

		Dossier::updateOrCreate([
			'idUtilisateur' => auth()->id()],
			['resultatBac' => $path1,
			'carteDidentite' => $path2,
			'etatDossier' => 'En Attente',
		]);	

		flash("Votre dossier a été mis à jour.")->success();
		return back();
    }
}
