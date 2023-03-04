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

            {{-- Заголовок --}}
            @isset($h1)
                <h1>{{ $h1 }}</h1>
            @endisset

            {{-- Підзаголовок --}}
            @isset($h4)
                <h4>{{ $h4 }}</h4>
            @endisset

            {{ $slot }}
{{--            @if(true)--}}
{{--                <videos-component :videos="[--}}
{{--            {original_url: 'file1.mp4', mime_type: 'video/mp4'},--}}
{{--            {original_url: 'file1.mp4', mime_type: 'video/mp4'},--}}
{{--            {original_url: 'file1.mp4', mime_type: 'video/mp4'},--}}
{{--          ]"></videos-component>--}}
{{--            @endif--}}

            {{-- Текст --}}
            @isset($text)
                {!! $text !!}
            @endisset
        </div>

        <x-site.footer/>

        <script src="{{ asset(mix('js/app.js')) }}"></script>
    </body>
</html>
