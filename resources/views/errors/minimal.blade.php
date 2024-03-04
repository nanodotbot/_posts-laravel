<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/error.css') }}">

        <title>@yield('title')</title>
    </head>
    <body>
        <main>
            <div class="header">
                <p class="header-1">
                    @yield('code')
                </p>
                <p>|</p>
                <p class="header-2">
                    @yield('title')
                </p>
            </div>
            <p class="message">
                @yield('message')
            </p>
            <a href="/">Zurück zur Hauptseite</a>
        </main>
    </body>
</html>
