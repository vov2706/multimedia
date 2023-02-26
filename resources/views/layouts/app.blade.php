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

    <div id="app" style="height: 100%">
        @if(false)
            <example-component></example-component>
        @endif
        @if(true)
            <photos-component></photos-component>
        @endif
    </div>
    <footer class="footer col-sm-12 col-md-9" style="background: whitesmoke" >
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>About Us</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque finibus ex eget est posuere, eu vestibulum lorem volutpat. Donec euismod pharetra odio, sed tristique neque pulvinar eget.</p>
                </div>
                <div class="col-md-3">
                    <h3>Links</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3>Contact Us</h3>
                    <ul>
                        <li>123 Main Street</li>
                        <li>Anytown, USA 12345</li>
                        <li>Phone: 555-555-5555</li>
                        <li>Email: info@example.com</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <p>&copy; 2023 Example Company. All rights reserve.</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset(mix('js/app.js')) }}"></script>
</body>
<style>
    .footer {
        margin-right: auto;
        margin-left: auto;
        padding: 40px;
        background-color: whitesmoke;
    }
</style>
</html>
