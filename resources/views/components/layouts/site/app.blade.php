<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
    </head>
    <body>
        <x-site.header></x-site.header>
        <div id="app">
            @if(false)
                <example-component></example-component>
            @endif
            @if(true)
                <photos-component :images="[
            {url: 'http://placehold.it/1200x800'},
            {url: 'http://placehold.it/1200x800'},
            {url: 'https://i.imgur.com/WcHGTSP.jpeg'},
          ]"></photos-component>
            @endif
        </div>

        <x-site.footer></x-site.footer>
        <script src="{{ asset(mix('js/app.js')) }}"></script>
    </body>
</html>
