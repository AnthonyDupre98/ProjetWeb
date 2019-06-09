<?php

namespace App\Http\Controllers;

use App\Dossier;
use App\Utilisateur;

class DossierController extends Controller
{

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

	public function dossier(){
		request()->validate([
		    'resultatBac' => ['required', 'image'],
		    'carteDidentite' => ['required', 'image'],
            'prenom' => ['required', 'string'],
            'nom' => ['required', 'string'],
            'datenaissance' => ['required'],
            'villenaissance' => ['required', 'string'],
            'adresseactuelle' => ['required', 'string'],
            'codepostal' => ['required', 'integer'],
		]);

		$path1 = request('resultatBac')->store('resultatsBac', 'public');
		$path2 = request('carteDidentite')->store('cartesDidentite', 'public');

		Dossier::updateOrCreate([
			'idUtilisateur' => auth()->id()],
			['resultatBac' => $path1,
			'carteDidentite' => $path2,
			'etatDossier' => 'En Attente',
            'prenomUtilisateur' => request('prenom'),
            'nomUtilisateur' => request('nom'),
            'dateNaissance' => request('datenaissance'),
            'genre' => request('genre'),
            'villeNaissance' => request('villenaissance'),
            'adresseActuelle' => request('adresseactuelle'),
            'codePostal' => request('codepostal'),
		]);	

		flash("Votre dossier a été mis à jour.")->success();
		return back();
    }

    public function supprimer(){
    	$dossier = Dossier::where("idUtilisateur", auth()->id());
		$dossier->delete();

		flash("Votre dossier a été supprimé.")->success();
		return back();
    }

    public function candidature(){
    	$mel = request('mel');
    	$utilisateur = Utilisateur::where('mel', $mel)->firstOrFail();
        $dossier = null;

        if(Dossier::where('idUtilisateur', $utilisateur->idUtilisateur)->exists()){
        $dossier = Dossier::where('idUtilisateur', $utilisateur->idUtilisateur)->firstOrFail();        
        }

    	return view('candidature', [
    		'utilisateur' => $utilisateur,
            'dossier' => $dossier,
    	]);
    }

    public function supprimerCandidature(){
        $mel = request('mel');
        $utilisateur = Utilisateur::where("mel", $mel)->firstOrFail();

        Dossier::where('idUtilisateur', $utilisateur->idUtilisateur)->update([
            'etatDossier' => "Supprimé",
        ]);
        return back();
    }

    public function refuserCandidature(){
        $mel = request('mel');
        $utilisateur = Utilisateur::where("mel", $mel)->firstOrFail();

        Dossier::where('idUtilisateur', $utilisateur->idUtilisateur)->update([
            'etatDossier' => "Refusé",
        ]);
        return back();
    }
}
