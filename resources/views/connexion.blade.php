@extends('layout')

@section('contenu')
	<div class="notification">
	<h1>Connexion</h1>
    <form action="{{url('/connexion')}}" method="post" class="section">
    	{{ csrf_field() }}

		<div class="field">
			<label class="label">Adresse e-mail : </label>
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
				<input class="input" type="password" name="password" placeholder="Mot de passe">
			</div>
			@if($errors->has('password'))
    			<p class="help is-danger">{{ $errors->first('password') }}</p>
    		@endif
    	</div>

		<div class="field">
			<div class="control">
				<button class="button is-link" type="submit">Se connecter</button>
			</div>
		</div>
    </form>
	</div>
@endsection