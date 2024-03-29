<!doctype html>
<html lang="fr-fr">
    <head>
        <link rel="stylesheet" type="text/css" href="{{url('/css/reset.css')}}" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Candidatech</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css" />
        <link rel="stylesheet" type="text/css" href="{{url('/css/monstyle.css')}}" />

    </head>
    <body>
        <section class="hero is-primary is-medium is-fullwidth">
            <!-- Hero head: will stick at the top -->
            <div class="hero-head">
                <nav class="navbar">
                    <div class="container">
                        <div class="navbar-brand">
                            <a class="navbar-item" href="{{url('/')}}">
                                <h1>Candidatech</h1>
                            </a>
                            <span id="nav-toggle" class="navbar-burger burger" data-target="navbarMenuHeroA">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </div>
                        <div id="navbarMenuHeroA" class="navbar-menu">
                            <div class="navbar-end">
                                @include('partials.navbar-item', ['lien' => '/', 'texte' => 'Accueil'])
                                @if (auth()->guard('admin')->check())
                                    @if (auth()->guard('admin')->user()->superAdmin)
                                        @include('partials.navbar-item', ['lien' => 'formulaire-admin', 'texte' => 'Ajouter un admin'])
                                    @endif
                                @endif
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
                            <li><a class="navbar-item" href="{{url('/mon-compte')}}">Étudiant</a></li>
                            <li><a class="navbar-item" href="{{url('/mon-compte-admin')}}">Enseignant</a></li>
                            <li><a class="navbar-item" href="http://www.polytech-reseau.org/index.php?id=68&tipUrl=http%3A%2F%2Fwww.polytech-reseau.org%2F%3Fid%3D496">Contacts</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </section>
        <script type="text/javascript">
            document.getElementById("nav-toggle").addEventListener ("click", toggleNav);
            function toggleNav() {
                var nav = document.getElementById("navbarMenuHeroA");
                var className = nav.getAttribute("class");
                if(className == "nav-right navbarMenuHeroA") {
                    nav.className = "nav-right navbarMenuHeroA is-active";
                } else {
                    nav.className = "nav-right navbarMenuHeroA";
                }
            }
        </script>
    </body>
</html>
