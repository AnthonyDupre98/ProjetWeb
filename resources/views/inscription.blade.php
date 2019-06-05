@extends('layout')

@section('contenu')
	<h1>Formulaire d'inscription</h1>
    <form action="/inscription" method="post" class="section">
    	{{ csrf_field() }}
		<div class="field">
			<label class="label">Prénom : </label>
			<div class="control">
				<input class="input" type="text" name="prenom" placeholder="Prénom" value="{{ old('prenom')}}">
			</div>
			@if($errors->has('prenom'))
    			<p class="help is-danger">{{ $errors->first('prenom') }}</p>
    		@endif
		</div>
    	
    	<div class="field">
			<label class="label">Nom : </label>
			<div class="control">
				<input class="input" type="text" name="nom" placeholder="Nom" value="{{ old('nom')}}">
			</div>
			@if($errors->has('nom'))
    			<p class="help is-danger">{{ $errors->first('nom') }}</p>
    		@endif
		</div>

		<div class="field">
			<label class="label">Date de naissance : </label>
			<div class="control">
				<input class="input" type="date" name="datenaissance" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" min="1900-01-01" max="2019-01-01" value="{{ old('datenaissance')}}">
			</div>
			@if($errors->has('datenaissance'))
    			<p class="help is-danger">{{ $errors->first('datenaissance') }}</p>
    		@endif
		</div>

    	<p>Genre :
    	<select name="genre">
			<option value="M">Homme</option>
			<option value="F">Femme</option>
			<option value="X">Autre</option>
		</select></p>

		<div class="field">
			<label class="label">Ville de naissance : </label>
			<div class="control">
				<input class="input" type="text" name="villenaissance" placeholder="Ville" value="{{ old('villenaissance')}}">
			</div>
			@if($errors->has('villenaissance'))
    			<p class="help is-danger">{{ $errors->first('villenaissance') }}</p>
    		@endif
		</div>

		<div class="field">
			<label class="label">Adresse actuelle : </label>
			<div class="control">
				<input class="input" type="text" name="adresseactuelle" placeholder="1 rue Charles Gille" value="{{ old('adresseactuelle')}}">
			</div>
			@if($errors->has('adresseactuelle'))
    			<p class="help is-danger">{{ $errors->first('adresseactuelle') }}</p>
    		@endif
		</div>

		<div class="field">
			<label class="label">Code postal : </label>
			<div class="control">
				<input class="input" type="number" name="codepostal" min="0" placeholder="00000" value="{{ old('codepostal')}}">
			</div>
			@if($errors->has('codepostal'))
    			<p class="help is-danger">{{ $errors->first('codepostal') }}</p>
    		@endif
    	</div>

		<div class="field">
			<label class="label">Email : </label>
			<div class="control">
				<input class="input" type="email" name="email" min="0" placeholder="prenom.nom@mail.com" value="{{ old('email')}}">
			</div>
			@if($errors->has('email'))
    			<p class="help is-danger">{{ $errors->first('email') }}</p>
    		@endif
    	</div>

    	<div class="field">
			<label class="label">Mot de passe : </label>
			<div class="control">
				<input class="input" type="password" name="password" placeholder="Mot de passe" value="{{ old('password')}}">
			</div>
			@if($errors->has('password'))
    			<p class="help is-danger">{{ $errors->first('password') }}</p>
    		@endif
    	</div>

    	<div class="field">
			<label class="label">Confirmer le mot de passe : </label>
			<div class="control">
				<input class="input" type="password" name="password_confirmation" placeholder="Mot de passe (confirmation)" value="{{ old('password_confirmation')}}">
			</div>
			@if($errors->has('password_confirmation'))
    			<p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
    		@endif
    	</div>

		<div class="field">
			<div class="control">
				<button class="button is-link" type="submit">M'inscrire</button>
			</div>
		</div>
    </form>
@endsection