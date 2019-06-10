@extends('layout')

@section('contenu')
    <h1 class="title is-l">{{ $utilisateur->mel }}</h1>

    <div class="notification">
    	<h1>Dossier déposé : </h1>
        
        <form action="{{url('/candidature/$utilisateur->mel')}}" method="post" class="section" enctype="multipart/form-data">
        	{{ csrf_field() }}
        	<div class="section">
        		<div class="field">
	    			<label class="label">Informations : </label>
	        	</div>
    			@if($dossier != null)
	                <p>Nom : {{$dossier->nomUtilisateur}}</p>
	                <p>Prénom: {{$dossier->prenomUtilisateur}}</p>
	                <p>Date de naissance: {{$dossier->dateNaissance}}</p>
	                <p>Genre : {{$dossier->genre}}</p>
	                <p>Ville de naissance : {{$dossier->villeNaissance}}</p>
	                <p>Adresse actuelle : {{$dossier->adresseActuelle}}</p>
	                <p>Code postal : {{$dossier->codePostal}}</p>
	         	@else
	                <p>Nom : N/A</p>
	                <p>Prénom: N/A</p>
	                <p>Date de naissance: N/A</p>
	                <p>Genre : N/A</p>
	                <p>Ville de naissance : N/A</p>
	                <p>Adresse actuelle : N/A</p>
	                <p>Code postal : N/A</p>
	                <p>SuperAdmin : N/A</p>
	        	@endif
	        	<br>
	        	<div class="field">
	    			<label class="label">Notes du BAC : </label>
	        	</div>
	        	@if($dossier != null)
		        	<p><a href="{{url('/storage/'.$dossier->resultatBac)}}" target="_blank"><img src="{{url('/storage/'.$dossier->resultatBac)}}" alt="Résultat de BAC" style="width:100%;max-width:350px"></a></p>
				@else
					<p>Aucun fichier n'a été déposé.</p>
	        	@endif
	        	<br>
	        	<br>
        	
	        	<div class="field">
	    			<label class="label">Carte d'identité : </label>
	        	</div>
	        	@if($dossier != null)
					<a href="{{url('/storage/'.$dossier->carteDidentite)}}"><img src="{{url('/storage/'.$dossier->carteDidentite)}}" alt="Résultat de bac" style="width:100%;max-width:350px"></a>
				@else
					<p>Aucun fichier n'a été déposé.</p>
		        @endif
		    
	        	<div class="section">
	    		@if($dossier != null)
		    		<label class="label">État du dossier : </label>
	        		<p>{{ $dossier->etatDossier }}</p>
	    		@endif
	    		</div>
    		</div>
    	</form>
        @if($dossier != null)
			@if($dossier->etatDossier === "En cours d'instruction")
				<form action="{{url('/candidature/supprimer/$utilisateur->mel')}}" method="post" class="section">
					@method("patch")
					{{ csrf_field() }}
					<div class="field">
		    			<div class="control">
		    				<input type="hidden" name="mel" value="{{$utilisateur->mel}}">
							<button class="button is-danger is-big" type="submit">Supprimer ce dossier</button>
						</div>
		    		</div>
				</form>
				<form action="{{url('/candidature/refuser/$utilisateur->mel')}}" method="post" class="section">
					@method("patch")
					{{ csrf_field() }}
					<div class="field">
		    			<div class="control">
		    				<input type="hidden" name="mel" value="{{$utilisateur->mel}}">
							<button class="button is-danger is-big" type="submit">Refuser ce dossier</button>
						</div>
		    		</div>
				</form>
			@elseif($dossier->etatDossier === "En Attente")
				<form action="{{url('/candidature/bloquer/$utilisateur->mel')}}" method="post" class="section">
					@method("patch")
					{{ csrf_field() }}
					<div class="field">
		    			<div class="control">
		    				<input type="hidden" name="mel" value="{{$utilisateur->mel}}">
							<button class="button is-danger is-big" type="submit">Bloquer ce dossier</button>
						</div>
		    		</div>
				</form>
			@endif
		@endif
	</div>
@endsection