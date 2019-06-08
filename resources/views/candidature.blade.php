@extends('layout')

@section('contenu')
    <h1 class="title is-l">{{ $utilisateur->mel }}</h1>

    <div class="notification">
    	<h1>Dossier déposé : </h1>
        
        <form action="/{mel}" method="post" class="section" enctype="multipart/form-data">
        	{{ csrf_field() }}
        	<div class="section">
	        	<div class="field">
	    			<label class="label">Notes du BAC : </label>
	        	</div>
	        	@if($dossier != null)
		        	<label class="label">Fichier sauvegardé : </label>
		        	<img id="myImg" src="/storage/{{ $dossier->resultatBac }}" alt="Résultat de bac" style="width:100%;max-width:350px">
		        	<div id="myModal" class="modal">
						<span class="close">&times;</span>
						<img class="modal-content" id="img01">
						<div id="caption"></div>
					</div>
				@else
					<p>Aucun fichier n'a été déposé.</p>
	        	@endif
        	</div>

        	<div class="section">
	        	<div class="field">
	    			<label class="label">Carte d'identité : </label>
	        	</div>
	        	@if($dossier != null)
	        		<label class="label">Fichier sauvegardé : </label>
    				<a href="/storage/{{ $dossier->carteDidentite }}"><img src="/storage/{{ $dossier->carteDidentite }}" alt="Résultat de bac" style="width:100%;max-width:350px"></a>
    			@else
					<p>Aucun fichier n'a été déposé.</p>
		        @endif
	        </div>

        	<div class="section">
    		@if($dossier != null)
	    		<label class="label">État du dossier : </label>
        		<p>{{ $dossier->etatDossier }}</p>
    		@endif
    		</div>
    	</form>
        @if($dossier != null)
			<form action="/candidature/{mel}" method="post" class="section">
				<div class="field">
	    			<div class="control">
						<button class="button is-danger is-big" type="submit">Supprimer ce dossier</button>
						<button class="button is-danger is-big" type="submit">Refuser ce dossier</button>
					</div>
	    		</div>
			</form>
		@endif
	</div>
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