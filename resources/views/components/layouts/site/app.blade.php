<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title }}</title>

        <meta name="description" content="{{ $description }}">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
    </head>
    <body>
        <x-site.header/>

        <div @class([
            "header_text col--12 col-md-9 text-center",
            "mt-5" => current_route_name() !== 'games',
        ])>
            {{-- Заголовок --}}
            @isset($h1)
                <h1>{{ $h1 }}</h1>
            @endisset

            {{-- Підзаголовок --}}
            @isset($h2)
                <h2>{{ $h2 }}</h2>
            @endisset
        </div>

        <div id="app">
            {{ $slot }}
        </div>

        <div class="header_text col-sm-12 col-md-9" style="font-size: 1.4em;">
            @isset($text)
                {!! $text !!}
            @endisset
        </div>

        <x-site.footer/>

        <script src="{{ asset(mix('js/app.js')) }}"></script>
    </body>
</html>
