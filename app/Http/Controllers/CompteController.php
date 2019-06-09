<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilisateur;
use App\Administrateur;

class CompteController extends Controller
{
    //renvoie à la vue du compte avec une variable pour pouvoir afficher les infos de l'utilisateur
    public function compte(){
        $utilisateur = Utilisateur::where('idUtilisateur', auth()->user()->idUtilisateur)->firstOrFail();

        return view('mon-compte', [
            'utilisateur' => $utilisateur,
        ]);
    }

    //renvoie a la vue du compte avec une variable pour pouvoir afficher les infos de l'admin
    public function compteAdmin(){

        $admininistrateur = Administrateur::where('idAdmin', auth()->guard('admin')->user()->idAdmin)->firstOrFail();

        return view('mon-compte-admin', [
            'admininistrateur' => $admininistrateur,
        ]);
    }

    //deconnecte l'utilisateur et le renvoie a la page d'accueil
    public function deconnexion(){
        auth()->logout();
        flash('Vous êtes maintenant déconnecté(e).')->success();
        return redirect('/');
    }

    //deconnecte l'admin et le renvoie a la page d'accueil
    public function deconnexionAdmin(){
    	auth()->guard('admin')->logout();
    	flash('Vous êtes maintenant déconnecté(e).')->success();
    	return redirect('/');
    }

    //modifie le mot de passe d'un utilisateur
    public function modificationMotDePasse(){
    	request()->validate([
    		'password' => ['required', 'confirmed'],
			'password_confirmation' => ['required']
    	]);

    	auth()->user()->update([
    		'motDePasse' => bcrypt(request('password'))
    	]);

    	flash('Votre mot de passe a bien été mis à jour.')->success();
    	return back();
    }

    //modifie le mot de passe d'un admin
    public function modificationMotDePasseAdmin(){
        request()->validate([
            'password' => ['required', 'confirmed'],
            'password_confirmation' => ['required']
        ]);

        auth()->guard('admin')->user()->update([
            'motDePasse' => bcrypt(request('password'))
        ]);

        flash('Votre mot de passe a bien été mis à jour.')->success();
        return back();
    }
}
