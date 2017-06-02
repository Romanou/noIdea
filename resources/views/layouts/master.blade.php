<html>
    <head>
        <meta charset="UTF-8"/>
        <title>NoIedea - @yield('title')</title>
        <link rel="stylesheet" href="/css/grid.css">
        <link rel="stylesheet" href="/css/style.css"/>
    </head>
    <body>
        <nav id="header">
            <ul>
                <li><a href="/">Accueil</a></li>
                @if(!Auth::check())
                    <li><a href="/login">Connexion</a></li>
                @else
                    <li>
                        <a href="/logout">Deconnexion</a>
                    </li>
                    <li>
                        <a href="/song/new">Nouveau son</a>
                    </li>
                    <li class="search">
                        <form action="/search" method="GET">
                            <input type="search" name="term" placeholder="Une recherche ?" required>
                            <input type="submit">
                        </form>
                    </li>
                @endif
            </ul>
        </nav>
        <main class="container">
            @yield('content')
        </main>
    </body>
</html>
