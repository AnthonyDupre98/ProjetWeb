<?php

namespace App\Http\Controllers;

use App\Administrateur;

class AdminController extends Controller
{
    //renvoie au formulaire d'incription d'un admin 
    public function formulaireAdmin(){
    	return view('formulaire-admin');
    }

    //permet d'ajouter les données du formulaire a la table administrateurs
    public function ajouterAdmin(){
        request()->validate([
            'prenom' => ['required', 'string'],
            'nom' => ['required', 'string'],
            'datenaissance' => ['required'],
            'villenaissance' => ['required', 'string'],
            'adresseactuelle' => ['required', 'string'],
            'codepostal' => ['required', 'integer'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed'],
            'password_confirmation' => ['required'],
        ]);

        $administrateur = Administrateur::create([
            'prenomAdmin' => request('prenom'),
            'nomAdmin' => request('nom'),
            'dateNaissance' => request('datenaissance'),
            'genre' => request('genre'),
            'villeNaissance' => request('villenaissance'),
            'adresseActuelle' => request('adresseactuelle'),
            'codePostal' => request('codepostal'),
            'mel' => request('email'),
            'motDePasse' => bcrypt(request('password')),
            'superAdmin' => request('superadmin'),
        ]);
    
        flash('Nouveau compte admin créé !')->success();
        return back();
    }
}