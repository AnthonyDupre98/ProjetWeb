@extends('layout')

@section('contenu')
    <h1>Les utilisateurs</h1>

    <ul>
    	@foreach($utilisateurs as $utilisateur)
    		<li>
    		{{ $utilisateur -> prenomUtilisateur }}
    		{{ $utilisateur -> nomUtilisateur }}
    		{{ $utilisateur -> mel }}
    		</li>
    	@endforeach
    </ul>
@endsection