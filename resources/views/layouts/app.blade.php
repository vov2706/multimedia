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
    <nav class="navbar navbar-expand-lg navbar-font">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav w-auto justify-content-center row">
                <li class="nav-item col">
                    <a class="nav-link active" aria-current="page" href="#">Головна</a>
                </li>
                <li class="nav-item col">
                    <a class="nav-link" href="#">Контакти</a>
                </li>
                <li class="nav-item col">
                    <a class="nav-link" href="#">Контакти</a>
                </li>

                <li class="nav-item dropdown col">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Про наші проекти
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Міжнародні</a></li>
                        <li><a class="dropdown-item" href="#">В рамках вивчення дисциплін</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="flex-row float-right w-auto d-flex" style="margin-right: 15px">
            <a class="nav-link" href="#">ua</a>|<a class="nav-link" href="#">en</a>
        </div>
    </nav>

    <div id="app">
        @if(false)
            <example-component></example-component>
        @endif
        @if(true)
            <photos-component></photos-component>
        @endif
    </div>
    <script src="{{ asset(mix('js/app.js')) }}"></script>
</body>
</html>
