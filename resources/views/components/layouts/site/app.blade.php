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

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
    </head>
    <body>
        <x-site.header/>

        <div id="app">
            <div class="header_text col-sm-12 col-md-9">
                {{-- Заголовок --}}
                @isset($h1)
                    <h1>{{ $h1 }}</h1>
                @endisset

                {{-- Підзаголовок --}}
                @isset($h2)
                    <h2>{{ $h2 }}</h2>
                @endisset
            </div>
            <div class="header_text col-sm-12 col-md-9" style="font-size: 1.4em;">
                @isset($text)
                    {!! $text !!}
                @endisset
            </div>
            {{ $slot }}
        </div>

        <x-site.footer/>

        <script src="{{ asset(mix('js/app.js')) }}"></script>
    </body>
</html>
