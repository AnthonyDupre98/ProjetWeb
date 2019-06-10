@extends('layout')

@section('contenu')
    <div class="notification">
        <h1>Mon compte</h1>
        <div class="section">
                <p>Adresse e-mail : {{$admininistrateur->mel}}</p>
                <p>Nom : {{$admininistrateur->nomAdmin}}</p>
                <p>Prénom: {{$admininistrateur->prenomAdmin}}</p>
                <p>Date de naissance: {{$admininistrateur->dateNaissance}}</p>
                <p>Genre : {{$admininistrateur->genre}}</p>
                <p>Ville de naissance : {{$admininistrateur->villeNaissance}}</p>
                <p>Adresse actuelle : {{$admininistrateur->adresseActuelle}}</p>
                <p>Code postal : {{$admininistrateur->codePostal}}</p>
                <p>SuperAdmin : {{$admininistrateur->superAdmin}}</p>
        </div>
        <h1>Changer mon mot de passe</h1>
        <div class="section">
            <form action="{{url('/modification-mot-de-passe-admin')}}" method="post" class="section">
            	{{ csrf_field() }}
                @method("patch")

            	<div class="field">
        			<label class="label">Nouveau mot de passe : </label>
        			<div class="control">
        				<input class="input" type="password" name="password" placeholder="Mot de passe">
        			</div>
        			@if($errors->has('password'))
            			<p class="help is-danger">{{ $errors->first('password') }}</p>
            		@endif
            	</div>

            	<div class="field">
        			<label class="label">Confirmer le nouveau mot de passe : </label>
        			<div class="control">
        				<input class="input" type="password" name="password_confirmation" placeholder="Mot de passe (confirmation)">
        			</div>
        			@if($errors->has('password_confirmation'))
            			<p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
            		@endif
            	</div>

        		<div class="field">
        			<div class="control">
        				<button class="button is-link" type="submit">Modifier mon mot de passe</button>
        			</div>
        		</div>
            </form>
        </div>
    </div>
@endsection