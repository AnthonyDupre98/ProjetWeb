@extends('layout')

@section('contenu')
    <div class="notification">
        <div class="section">
            <h1>Les utilisateurs</h1>

            <ul>
            	@foreach($utilisateurs as $utilisateur)
            		<li>
                    {{ $utilisateur -> nomUtilisateur }}
            		{{ $utilisateur -> prenomUtilisateur }}
            		<a heref="/{{ $utilisateur -> mel }}">{{ $utilisateur -> mel }}</a>
            		</li>
            	@endforeach
            </ul>
        </div>
    </div>
@endsection