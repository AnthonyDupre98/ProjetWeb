@extends('layout')

@section('contenu')
    <h1 class="title is-l">{{ $utilisateur->mel }}</h1>

    @if (auth()->check() AND (auth()->user()->idUtilisateur === $utilisateur->idUtilisateur))
    <div class="notification">
    	<div class="field">
    		<form action="/{{ $utilisateur->mel }}" method="post" class="section" enctype="multipart/form-data">
	    		{{ csrf_field() }}
	    		<h1>Rentrez vos informations : </h1>
	    		<div class="field">
					<label class="label">Prénom : </label>
		    		@if ($dossier === null)
			        	<div class="control">
							<input class="input" type="text" name="prenom" placeholder="Prénom" value="{{ old('prenom')}}">
						</div>
	    			@elseif ($dossier->etatDossier === "En Attente")
		    			<p>{{ $dossier->prenomUtilisateur }}</p>
						<div class="control">
							<input class="input" type="text" name="prenom" placeholder="Prénom" value="{{ old('prenom')}}">
						</div>
					@else
						<p>{{ $dossier->prenomUtilisateur }}</p>
	    			@endif
					@if($errors->has('prenom'))
		    			<p class="help is-danger">{{ $errors->first('prenom') }}</p>
		    		@endif
				</div>
		    	
		    	<div class="field">
					<label class="label">Nom : </label>
					@if ($dossier === null)
			        	<div class="control">
							<input class="input" type="text" name="nom" placeholder="Nom" value="{{ old('nom')}}">
						</div>
	    			@elseif ($dossier->etatDossier === "En Attente")
		    			<p>{{ $dossier->nomUtilisateur }}</p>
						<div class="control">
							<input class="input" type="text" name="nom" placeholder="Nom" value="{{ old('nom')}}">
						</div>
					@else
						<p>{{ $dossier->nomUtilisateur }}</p>
	    			@endif
					@if($errors->has('nom'))
		    			<p class="help is-danger">{{ $errors->first('nom') }}</p>
		    		@endif
				</div>
				
				<div class="field">
					<label class="label">Date de naissance : </label>
					@if ($dossier === null)
			        	<div class="control">
							<input class="input" type="date" name="datenaissance" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" min="1900-01-01" max="2019-01-01" value="{{ old('datenaissance')}}">
						</div>
	    			@elseif ($dossier->etatDossier === "En Attente")
		    			<p>{{ $dossier->dateNaissance }}</p>
						<div class="control">
							<input class="input" type="date" name="datenaissance" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" min="1900-01-01" max="2019-01-01" value="{{ old('datenaissance')}}">
						</div>
					@else
						<p>{{ $dossier->dateNaissance }}</p>
	    			@endif
					@if($errors->has('datenaissance'))
		    			<p class="help is-danger">{{ $errors->first('datenaissance') }}</p>
		    		@endif
				</div>

		    	<div class="field">
					<label class="label">Genre : </label>
					@if ($dossier === null)
			        	<div class="control">
					    	<select name="genre">
								<option value="M">Homme</option>
								<option value="F">Femme</option>
								<option value="X">Autre</option>
							</select></p>
						</div>
	    			@elseif ($dossier->etatDossier === "En Attente")
		    			<p>{{ $dossier->genre }}</p>
						<div class="control">
					    	<select name="genre">
								<option value="M">Homme</option>
								<option value="F">Femme</option>
								<option value="X">Autre</option>
							</select></p>
						</div>
					@else
						<p>{{ $dossier->genre }}</p>
	    			@endif
				</div>

				<div class="field">
					<label class="label">Ville de naissance : </label>
					@if ($dossier === null)
			        	<div class="control">
							<input class="input" type="text" name="villenaissance" placeholder="Ville" value="{{ old('villenaissance')}}">
						</div>
	    			@elseif ($dossier->etatDossier === "En Attente")
		    			<p>{{ $dossier->villeNaissance }}</p>
						<div class="control">
							<input class="input" type="text" name="villenaissance" placeholder="Ville" value="{{ old('villenaissance')}}">
						</div>
					@else
						<p>{{ $dossier->villeNaissance }}</p>
	    			@endif
					@if($errors->has('villenaissance'))
		    			<p class="help is-danger">{{ $errors->first('villenaissance') }}</p>
		    		@endif
				</div>

				<div class="field">
					<label class="label">Adresse actuelle : </label>
					@if ($dossier === null)
			        	<div class="control">
							<input class="input" type="text" name="adresseactuelle" placeholder="1 rue Charles Gille" value="{{ old('adresseactuelle')}}">
						</div>
	    			@elseif ($dossier->etatDossier === "En Attente")
		    			<p>{{ $dossier->adresseActuelle }}</p>
						<div class="control">
							<input class="input" type="text" name="adresseactuelle" placeholder="1 rue Charles Gille" value="{{ old('adresseactuelle')}}">
						</div>
					@else
						<p>{{ $dossier->villeNaissance }}</p>
	    			@endif
					@if($errors->has('adresseActuelle'))
		    			<p class="help is-danger">{{ $errors->first('villenaissance') }}</p>
		    		@endif
					@if($errors->has('adresseactuelle'))
		    			<p class="help is-danger">{{ $errors->first('adresseactuelle') }}</p>
		    		@endif
				</div>

				<div class="field">
					<label class="label">Code postal : </label>
					@if ($dossier === null)
			        	<div class="control">
							<input class="input" type="number" name="codepostal" min="0" placeholder="00000" value="{{ old('codepostal')}}">
						</div>
	    			@elseif ($dossier->etatDossier === "En Attente")
		    			<p>{{ $dossier->codePostal }}</p>
						<div class="control">
							<input class="input" type="number" name="codepostal" min="0" placeholder="00000" value="{{ old('codepostal')}}">
						</div>
					@else
						<p>{{ $dossier->codePostal }}</p>
	    			@endif
					@if($errors->has('adresseActuelle'))
		    			<p class="help is-danger">{{ $errors->first('villenaissance') }}</p>
		    		@endif
					@if($errors->has('codepostal'))
		    			<p class="help is-danger">{{ $errors->first('codepostal') }}</p>
		    		@endif
		    	</div>

	    		<h1>Déposer vos fichiers : </h1>
	    		<p>(taille du fichier max. 1 Mo)</p>
	        	<div class="section">
		        	<div class="field">
		    			<label class="label">Notes du BAC : </label>
		    			@if ($dossier === null)
			        		<div class="control">
			        			<input type="hidden" name="MAX_FILE_SIZE" value="1048576">
		    					<input class="input" type="file" name="resultatBac" value="{{ old('resultatBac')}}">
		    				</div>
	    				@elseif ($dossier->etatDossier === "En Attente")
		    				<div class="control">
		    					<input type="hidden" name="MAX_FILE_SIZE" value="1048576">
		    					<input class="input" type="file" name="resultatBac" value="{{ old('resultatBac')}}">
		    				</div>
						@endif
		    			@if($errors->has('resultatBac'))
		        			<p class="help is-danger">{{ $errors->first('resultatBac') }}</p>
		        		@endif
		        	</div>
		        	@if($dossier != null)
		        	<label class="label">Fichier sauvegardé : </label>
			        	<p><a href="/storage/{{ $dossier->resultatBac }}" target="_blank"><img src="/storage/{{ $dossier->resultatBac }}" alt="Résultat de BAC" style="width:100%;max-width:350px"></a></p>
		        	@endif
	        	</div>

	        	<div class="section">
		        	<div class="field">
		    			<label class="label">Carte d'identité : </label>
		    			@if ($dossier === null)
			        		<div class="control">
			        			<input type="hidden" name="MAX_FILE_SIZE" value="1048576">
		    					<input class="input" type="file" name="carteDidentite" value="{{ old('carteDidentite')}}">
		    				</div>
	    				@elseif ($dossier->etatDossier === "En Attente")
		    				<div class="control">
		    					<input type="hidden" name="MAX_FILE_SIZE" value="1048576">
		    					<input class="input" type="file" name="carteDidentite" value="{{ old('carteDidentite')}}">
		    				</div>
						@endif
		    			@if($errors->has('carteDidentite'))
		        			<p class="help is-danger">{{ $errors->first('carteDidentite') }}</p>
		        		@endif
		        	</div>
		        	@if($dossier != null)
		        	<label class="label">Fichier sauvegardé : </label>
	    				<p><a href="/storage/{{ $dossier->carteDidentite }}" target="_blank"><img src="/storage/{{ $dossier->carteDidentite }}" alt="Carte d'identité" style="width:100%;max-width:350px"></a></p>
			        @endif
		        </div>
		        @if ($dossier === null)
		        	<div class="section">
			        	<div class="field">
			    			<div class="control">
			    				<button class="button is-link is-medium" type="submit">Soumettre mon dossier</button>
			    			</div>
			    		</div>
		    		</div>
	    		@elseif ($dossier->etatDossier === "En Attente")
		    		<div class="section">
			        	<div class="field">
			    			<div class="control">
			    				<button class="button is-link is-medium" type="submit">Soumettre mon dossier</button>
			    			</div>
			    		</div>
		    		</div>
	    		@else
		    		<div class="section">
			        	<div class="field">
			    			<div class="control">
			    				<button class="button is-link is-medium" type="submit" title="Disabled button" disabled>Soumettre mon dossier</button>
			    			</div>
			    		</div>
		    		</div>
		    	@endif
	    		@if($dossier != null)
			    	<label class="label">État du dossier : </label>
		        	<p>{{ $dossier->etatDossier }}</p>
		    	@endif
	    	</form>
	        @if($dossier != null)
	        	@if ($dossier->etatDossier === "En Attente")
					<form action="/{{ $utilisateur->mel }}" method="post" class="section" enctype="multipart/form-data">
						@method("delete")
						{{ csrf_field() }} 
						<div class="field">
			    			<div class="control">
								<button class="button is-danger" type="submit">Supprimer mon dossier</button>
							</div>
			    		</div>
					</form>
				@endif
			@endif
	</div>
	@endif
@endsection