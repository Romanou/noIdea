<html>
    <head>
        <meta charset="UTF-8"/>
        <title>NoIedea - @yield('title')</title>
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/grid.css">
        <link rel="stylesheet" href="/css/style.css"/>
    </head>
    <body>
        <nav id="header">
            <ul>
                <li><a href="/">Accueil</a></li>
                @if(!Auth::check())
                    <li id="searchButton">
                        Rechercher
                    </li>
                    <li><a href="/login">Connexion</a></li>
                @else
                    <li>
                        <a href="/song/new">Nouveau son</a>
                    </li>
                    <li id="searchButton">
                        Rechercher
                    </li>
                    <li>
                        <a href="/logout">Deconnexion</a>
                    </li>
                @endif
            </ul>
            <div class="search">
                <form action="/search" method="GET">
                    <input type="search" name="term" placeholder="Une recherche ?" required>
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </nav>
        <main class="container">
            @yield('content')
        </main>
        <script src="/js/main.js"></script>
    </body>
</html>
