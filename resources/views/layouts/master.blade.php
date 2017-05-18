<html>
    <head>
        <meta charset="UTF-8"/>
        <title>NoIedea - @yield('title')</title>
        <link rel="stylesheet" href="/css/style.css"/>
    </head>
    <body>
        <header>
            <ul>
                <li><a href="/">Accueil</a></li>
                @if(!Auth::check())
                    <li><a href="/login">Connexion</a></li>
                @else
                    <li><a href="/logout">Deconnexion</a></li>
                    <li><a href="/song/new">Nouveau son</a></li>
                @endif
            </ul>
        </header>
        <main>
            @yield('content')
        </main>
    </body>
</html>
