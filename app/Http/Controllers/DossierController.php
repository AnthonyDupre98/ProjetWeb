<?php

namespace App\Http\Controllers;

use App\Dossier;

class DossierController extends Controller
{
	public function dossier(){
		request()->validate([
		    'resultatBac' => ['required', 'image'],
		    'carteDidentite' => ['required', 'image'],
		]);

	Dossier::create([
		'idUtilisateur' => auth()->id(),
		'resultatBac' => request('resultatBac'),
		'carteDidentite' => request('carteDidentite'),
	]);
	flash("Votre dossier a été mis à jour.")->success();
	return redirect("/");
    }
}
