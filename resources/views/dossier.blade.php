@extends('layout')

@section('contenu')
    <h1 class="title is-l">{{ $utilisateur->mel }}</h1>

    @if (auth()->check() AND (auth()->user()->idUtilisateur === $utilisateur->idUtilisateur))
    <div class="notification">
    	<div class="field">
    		<form action="/{mel}" method="post" class="section" enctype="multipart/form-data">
	    		{{ csrf_field() }}
	    		<h1>Rentrez vos informations : </h1>
	    		<div class="field">
					<label class="label">Prénom : </label>
					@if($dossier != null)
		    			<p>{{ $dossier->prenomUtilisateur }}</p>
		    		@endif
					<div class="control">
						<input class="input" type="text" name="prenom" placeholder="Prénom" value="{{ old('prenom')}}">
					</div>
					@if($errors->has('prenom'))
		    			<p class="help is-danger">{{ $errors->first('prenom') }}</p>
		    		@endif
				</div>
		    	
		    	<div class="field">
					<label class="label">Nom : </label>
					@if($dossier != null)
		    			<p>{{ $dossier->nomUtilisateur }}</p>
		    		@endif
					<div class="control">
						<input class="input" type="text" name="nom" placeholder="Nom" value="{{ old('nom')}}">
					</div>
					@if($errors->has('nom'))
		    			<p class="help is-danger">{{ $errors->first('nom') }}</p>
		    		@endif
				</div>
				

				<div class="field">
					<label class="label">Date de naissance : </label>
					@if($dossier != null)
		    			<p>{{ $dossier->dateNaissance }}</p>
		    		@endif
					<div class="control">
						<input class="input" type="date" name="datenaissance" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" min="1900-01-01" max="2019-01-01" value="{{ old('datenaissance')}}">
					</div>
					@if($errors->has('datenaissance'))
		    			<p class="help is-danger">{{ $errors->first('datenaissance') }}</p>
		    		@endif
				</div>

		    	<div class="field">
					<label class="label">Genre : </label>
					@if($dossier != null)
		    			<p>{{ $dossier->genre }}</p>
		    		@endif
					<div class="control">
				    	<select name="genre">
							<option value="M">Homme</option>
							<option value="F">Femme</option>
							<option value="X">Autre</option>
						</select></p>
					</div>
				</div>

				<div class="field">
					<label class="label">Ville de naissance : </label>
					@if($dossier != null)
		    			<p>{{ $dossier->villeNaissance }}</p>
		    		@endif
					<div class="control">
						<input class="input" type="text" name="villenaissance" placeholder="Ville" value="{{ old('villenaissance')}}">
					</div>
					@if($errors->has('villenaissance'))
		    			<p class="help is-danger">{{ $errors->first('villenaissance') }}</p>
		    		@endif
				</div>

				<div class="field">
					<label class="label">Adresse actuelle : </label>
					@if($dossier != null)
		    			<p>{{ $dossier->adresseActuelle }}</p>
		    		@endif
					<div class="control">
						<input class="input" type="text" name="adresseactuelle" placeholder="1 rue Charles Gille" value="{{ old('adresseactuelle')}}">
					</div>
					@if($errors->has('adresseactuelle'))
		    			<p class="help is-danger">{{ $errors->first('adresseactuelle') }}</p>
		    		@endif
				</div>

				<div class="field">
					<label class="label">Code postal : </label>
					@if($dossier != null)
		    			<p>{{ $dossier->codePostal }}</p>
		    		@endif
					<div class="control">
						<input class="input" type="number" name="codepostal" min="0" placeholder="00000" value="{{ old('codepostal')}}">
					</div>
					@if($errors->has('codepostal'))
		    			<p class="help is-danger">{{ $errors->first('codepostal') }}</p>
		    		@endif
		    	</div>

	    		<h1>Déposer vos fichiers : </h1>
	    		<p>(formats acceptés : jpeg, png, bmp, gif, ou svg)</p>
	        	<div class="section">
		        	<div class="field">
		    			<label class="label">Notes du BAC : </label>
		    			<div class="control">
		    				<input class="input" type="file" name="resultatBac" value="{{ old('resultatBac')}}">
		    			</div>
		    			@if($errors->has('resultatBac'))
		        			<p class="help is-danger">{{ $errors->first('resultatBac') }}</p>
		        		@endif
		        	</div>
		        	@if($dossier != null)
		        	<label class="label">Fichier sauvegardé : </label>
		        	<img id="myImg" src="/storage/{{ $dossier->resultatBac }}" alt="Résultat de bac" style="width:100%;max-width:350px">
		        	<div id="myModal" class="modal">
						<span class="close">&times;</span>
						<img class="modal-content" id="img01">
						<div id="caption"></div>
					</div>
		        	@endif
	        	</div>

	        	<div class="section">
		        	<div class="field">
		    			<label class="label">Carte d'identité : </label>
		    			<div class="control">
		    				<input class="input" type="file" name="carteDidentite" value="{{ old('carteDidentite')}}">
		    			</div>
		    			@if($errors->has('carteDidentite'))
		        			<p class="help is-danger">{{ $errors->first('carteDidentite') }}</p>
		        		@endif
		        	</div>
		        	@if($dossier != null)
		        	<label class="label">Fichier sauvegardé : </label>
	    				<a href="/storage/{{ $dossier->carteDidentite }}"><img src="/storage/{{ $dossier->carteDidentite }}" alt="Résultat de bac" style="width:100%;max-width:350px"></a>
			        @endif
		        </div>
		        @if ($dossier === null)
		        	<div class="section">
			        	<div class="field">
			    			<div class="control">
			    				<button class="button is-link is-medium" type="submit">Ajouter/modifier mon dossier</button>
			    			</div>
			    		</div>
		    		</div>
	    		@elseif ($dossier->etatDossier === "En Attente")
		    		<div class="section">
			        	<div class="field">
			    			<div class="control">
			    				<button class="button is-link is-medium" type="submit">Ajouter/modifier mon dossier</button>
			    			</div>
			    		</div>
		    		</div>
	    		@else
		    		<div class="section">
			        	<div class="field">
			    			<div class="control">
			    				<button class="button is-link is-medium" type="submit" title="Disabled button" disabled>Ajouter/modifier mon dossier</button>
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
					<form action="/{mel}" method="post" class="section" enctype="multipart/form-data">
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
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>
@endsection