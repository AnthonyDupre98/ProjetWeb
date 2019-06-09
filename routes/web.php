<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacts', function () {
    return view('contacts');
});

Route::get('/inscription', 'InscriptionController@formulaire');
Route::post('/inscription', 'InscriptionController@traitement');

Route::get('/connexion', 'ConnexionController@formulaire');
Route::post('/connexion', 'ConnexionController@traitement');

Route::group([
	'middleware' => 'App\Http\Middleware\Admin',
], function(){
	Route::get('/mon-compte-admin', 'CompteController@compteAdmin');
	Route::get('/deconnexion-admin', 'CompteController@deconnexionAdmin');
	Route::patch('/modification-mot-de-passe', 'CompteController@modificationMotDePasse');

	Route::get('/utilisateurs', 'UtilisateursController@liste');

	Route::get('/candidature/{mel}', 'DossierController@candidature');
	Route::patch('/candidature/supprimer/{mel}', 'DossierController@supprimerCandidature');
	Route::patch('/candidature/refuser/{mel}', 'DossierController@refuserCandidature');
});

Route::group([
	'middleware' => 'App\Http\Middleware\Auth',
], function(){
	Route::get('/mon-compte', 'CompteController@compte');
	Route::get('/deconnexion', 'CompteController@deconnexion');
	Route::patch('/modification-mot-de-passe', 'CompteController@modificationMotDePasse');
	
	Route::get('/{mel}', 'DossierController@voirDossier');
	Route::post('/{mel}', 'DossierController@dossier');
	Route::delete('/{mel}', 'DossierController@supprimer');
});





