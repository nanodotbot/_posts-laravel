<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @stack('css')
        @stack('scripts')
        <title>{{config('app.name', 'Chat')}}</title>
    </head>
    <body>

        @yield('content')
        
    </body>
</html>
