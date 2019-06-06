@extends('layout')

@section('contenu')
        <h1 class="title is-l">{{ $utilisateur->mel }}</h1>

        @if (auth()->check() AND auth()->user()->idUtilisateur === $utilisateur->idUtilisateur)
        <div class="notification">
        	<h1>Déposer vos fichiers : </h1>
        	<p>(formats acceptés : jpeg, png, bmp, gif, ou svg)</p>
	        
	        <form action="/{mel}" method="post" class="section" enctype="multipart/form-data">
	        	{{ csrf_field() }}
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

	        	<div class="section">
		        	<div class="field">
		    			<div class="control">
		    				<button class="button is-link" type="submit">Ajouter les fichiers</button>
		    			</div>
		    		</div>
	    		@if($dossier != null)
		    		<label class="label">État du dossier : </label>
	        		<p>{{ $dossier->etatDossier }}</p>
        		@endif
	    		</div>
	        </form>
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