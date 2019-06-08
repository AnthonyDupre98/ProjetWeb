<!doctype html>
<html lang="fr-fr">
    <head>
        <link rel="stylesheet" type="text/css" href="/css/reset.css" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Candidatech</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css" />
        <link rel="stylesheet" type="text/css" href="/css/monstyle.css" />

    </head>
    <body>
        <section class="hero is-primary is-medium">
            <!-- Hero head: will stick at the top -->
            <div class="hero-head">
                <nav class="navbar">
                    <div class="container">
                        <div class="navbar-brand">
                            <a class="navbar-item" href="/">
                                <h1>Candidatech</h1>
                            </a>
                            <span class="navbar-burger burger" data-target="navbarMenuHeroA">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </div>
                        <div id="navbarMenuHeroA" class="navbar-menu">
                            <div class="navbar-end">
                                @include('partials.navbar-item', ['lien' => '/', 'texte' => 'Accueil'])
                                @if (auth()->guard('admin')->check())
                                    @include('partials.navbar-item', ['lien' => 'mon-compte-admin', 'texte' => 'Mon Compte'])
                                    @include('partials.navbar-item', ['lien' => 'utilisateurs', 'texte' => 'Utilisateurs'])
                                    @include('partials.navbar-item', ['lien' => 'deconnexion-admin', 'texte' => 'Déconnexion'])
                                @elseif (auth()->check())
                                    @include('partials.navbar-item', ['lien' => 'mon-compte', 'texte' => 'Mon Compte'])
                                    @include('partials.navbar-item', ['lien' => auth()->user()->mel, 'texte' => 'Mon Dossier'])
                                    @include('partials.navbar-item', ['lien' => 'deconnexion', 'texte' => 'Déconnexion'])
                                @else
                                    @include('partials.navbar-item', ['lien' => 'connexion', 'texte' => 'Se connecter'])
                                    @include('partials.navbar-item', ['lien' => 'inscription', 'texte' => "S'inscrire"])
                                @endif
                                
                                <span class="navbar-item">
                                    <a class="button is-primary is-inverted" href="http://www.polytech-reseau.org/index.php?id=2">
                                        <span>Polytech</span>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

                    <!-- Hero content: will be in the middle -->
            <div class="hero-body">
                <div class="container">
                @include('flash::message')
                @yield('contenu')
                </div>
            </div>

            <!-- Hero footer: will stick at the bottom -->
            <div class="hero-foot">
                <nav class="tabs">
                    <div class="container">
                        <ul>
                            <li><a class="navbar-item" href="/inscription">Étudiant</a></li>
                            <li><a class="navbar-item" href="/inscription">Enseignant</a></li>
                            <li><a class="navbar-item" href="/contacts">Contacts</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </section>
    </body>
</html>