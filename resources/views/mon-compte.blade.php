@extends('layout')

@section('contenu')
    <div class="notification">
        <div class="section">
            <h1 class="title is-l">Mon compte</h1>

            <p>Vous êtes bien connecté.</p>

            <a href="/deconnexion" class="button">Déconnexion</a>
        </div>

        <form action="/modification-mot-de-passe" method="post" class="section">
        	{{ csrf_field() }}

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
@endsection