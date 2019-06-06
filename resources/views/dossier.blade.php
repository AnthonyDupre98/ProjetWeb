@extends('layout')

@section('contenu')
    <div class="section">
        <h1 class="title is-l">{{ $utilisateur->mel }}</h1>

        @if (auth()->check() AND auth()->user()->idUtilisateur === $utilisateur->idUtilisateur)
        <div class="notification">
	        <form action="/dossier" method="post" class="section" enctype="multipart/form-data">
	        	{{ csrf_field() }}

	        	<div class="field">
	    			<label class="label">Notes du BAC : </label>
	    			<div class="control">
	    				<input class="input" type="file" name="resultatBac" value="{{ old('resultatBac')}}">
	    			</div>
	    			@if($errors->has('resultatBac'))
	        			<p class="help is-danger">{{ $errors->first('resultatBac') }}</p>
	        		@endif
	        	</div>

	        	<div class="field">
	    			<label class="label">Carte d'identité : </label>
	    			<div class="control">
	    				<input class="input" type="file" name="carteDidentite" value="{{ old('carteDidentite')}}">
	    			</div>
	    			@if($errors->has('carteDidentite'))
	        			<p class="help is-danger">{{ $errors->first('carteDidentite') }}</p>
	        		@endif
	        	</div>

	    		<div class="field">
	    			<div class="control">
	    				<button class="button is-link" type="submit">Ajouter les fichiers</button>
	    			</div>
	    		</div>
	        </form>
    	</div>
        @endif
    </div>
@endsection