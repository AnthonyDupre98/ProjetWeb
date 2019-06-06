<!doctype html>
<html lang="fr-fr">
    <head>
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
                            <a class="navbar-item">
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
                                <a class="navbar-item">
                                    Accueil
                                </a>
                                <a class="navbar-item">
                                    Se connecter
                                </a>
                                <a class="navbar-item">
                                    S'inscrire
                                </a>
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
                            <li class="is-active"><a>Overview</a></li>
                            <li><a>Modifiers</a></li>
                            <li><a>Grid</a></li>
                            <li><a>Elements</a></li>
                            <li><a>Components</a></li>
                            <li><a>Layout</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </section>
    </body>
</html>