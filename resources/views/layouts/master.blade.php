<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <title>NoIedea - @yield('title')</title>
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/grid.css">
        <link rel="stylesheet" href="/css/style.css"/>
    </head>
    <body>
        <nav id="header">
            <div class="menu">
                <div class="hamb">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="logo">
                    <a href="/">
                        NoIdea
                    </a>
                </div>
                <ul>
                    <li><a href="/">Accueil</a></li>
                    @if(!Auth::check())
                        <li id="searchButton" class="desk">
                            Rechercher
                        </li>
                        <li><a href="/login">Connexion</a></li>
                    @else
                        <li>
                            <a href="/song/new">Nouveau son</a>
                        </li>
                        <li id="searchButton" class="desk">
                            Rechercher
                        </li>
                        <li>
                            <a href="/logout">Deconnexion</a>
                        </li>
                    @endif
                        <li class="search mob">
                            <form action="/search" method="GET">
                                <input type="search" name="term" placeholder="Une recherche ?" required>
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </li>
                </ul>
            </div>
            <div class="search desk">
                <form action="/search" method="GET">
                    <input type="search" name="term" placeholder="Une recherche ?" required>
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </nav>
        <main id="main" class="container">
            @yield('content')
        </main>
        <script src="/js/main.js"></script>
    </body>
</html>
