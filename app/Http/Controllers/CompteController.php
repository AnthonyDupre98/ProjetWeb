<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilisateur;
use App\Administrateur;

class CompteController extends Controller
{
    public function compte(){

        $utilisateur = Utilisateur::where('idUtilisateur', auth()->user()->idUtilisateur)->firstOrFail();

        return view('mon-compte', [
            'utilisateur' => $utilisateur,
        ]);
    }

    public function compteAdmin(){

        $admininistrateur = Administrateur::where('idAdmin', auth()->guard('admin')->user()->idAdmin)->firstOrFail();

        return view('mon-compte-admin', [
            'admininistrateur' => $admininistrateur,
        ]);
    }

    public function deconnexion(){
        auth()->logout();
        flash('Vous êtes maintenant déconnecté(e).')->success();
        return redirect('/');
    }

    public function deconnexionAdmin(){
    	auth()->guard('admin')->logout();
    	flash('Vous êtes maintenant déconnecté(e).')->success();
    	return redirect('/');
    }

    public function modificationMotDePasse(){
    	request()->validate([
    		'password' => ['required', 'confirmed'],
			'password_confirmation' => ['required']
    	]);

    	auth()->user()->update([
    		'motDePasse' => bcrypt(request('password'))
    	]);

    	flash('Votre mot de passe a bien été mis à jour')->success();
    	return back();
    }
}
