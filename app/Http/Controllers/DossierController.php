<?php

namespace App\Http\Controllers;

use App\Dossier;
use App\Utilisateur;
use Storage;

class DossierController extends Controller
{
    //renvoie la vue du dossier cote utilisateur
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

    //permet d'ajouter les données du formulaire a la table dossiers
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
		
		if (Dossier::where("idUtilisateur", auth()->id())->exists()){
		$dossier = Dossier::where("idUtilisateur", auth()->id())->firstOrFail();
		unlink(storage_path('app/public/'.$dossier->resultatBac));
    	unlink(storage_path('app/public/'.$dossier->carteDidentite));	
		}

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

    //permet de supprimer un dossier cote utilisateur
    public function supprimer(){
    	$dossier = Dossier::where("idUtilisateur", auth()->id())->firstOrFail();
    	unlink(storage_path('app/public/'.$dossier->resultatBac));
    	unlink(storage_path('app/public/'.$dossier->carteDidentite));
		$dossier->delete();

		flash("Votre dossier a été supprimé.")->success();
		return back();
    }

    //renvoie la vue d'une candidature cote admin
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

    //permet a un admin de bloquer le dossier d'un utilisateur
    public function bloquerCandidature(){
        $mel = request('mel');
        $utilisateur = Utilisateur::where("mel", $mel)->firstOrFail();

        Dossier::where('idUtilisateur', $utilisateur->idUtilisateur)->update([
            'etatDossier' => "En cours d'instruction",
        ]);
        return back();
    }

    //change l'etat du dossier a supprime
    public function supprimerCandidature(){
        $mel = request('mel');
        $utilisateur = Utilisateur::where("mel", $mel)->firstOrFail();

        Dossier::where('idUtilisateur', $utilisateur->idUtilisateur)->update([
            'etatDossier' => "Supprimé",
        ]);
        return back();
    }

    //change l'etat du dossier a refuse
    public function refuserCandidature(){
        $mel = request('mel');
        $utilisateur = Utilisateur::where("mel", $mel)->firstOrFail();

        Dossier::where('idUtilisateur', $utilisateur->idUtilisateur)->update([
            'etatDossier' => "Refusé",
        ]);
        return back();
    }
}
