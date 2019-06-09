@extends('layout')

@section('contenu')
		<div class="box has-text-centered">
			<nav class="level">
				<div class="level-item has-text-centered">
					<figure class="image is-256x256 ">
						<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f0/Logo_Reseau_Polytech.svg/800px-Logo_Reseau_Polytech.svg.png" alt="Image">
					</figure>
				</div>
			</nav>
			@if (auth()->guard('admin')->check())
				<a class="button is-link is-outlined" href="/utilisateurs">Consulter les candidatures</a>

			@elseif (auth()->check())
				<a class="button is-link is-outlined" href="/{{auth()->user()->mel}}">Je dépose ma candidature !</a>
			@else
				<a class="button is-link is-outlined" href="/{mel}">Je dépose ma candidature !</a>
			@endif
		</div>
@endsection