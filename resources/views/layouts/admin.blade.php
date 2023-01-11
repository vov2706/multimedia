<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type="image/svg+xml" href="/admin/img/logo.webp">
    <link rel="alternate icon" href="/admin/img/logo.webp">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preload" as="font" type="font/woff2" href="/admin/fonts/400.woff2" crossorigin>
    <link rel="preload" as="font" type="font/woff2" href="/admin/fonts/300.woff2" crossorigin>
    <link rel="preload" as="font" type="font/woff2" href="/admin/fonts/600.woff2" crossorigin>
    <link rel="preload" as="font" type="font/woff2" href="/admin/fonts/700.woff2" crossorigin>

    @include('admin.main.stylesheet')

    @section('css')
    @show

</head>
<body class="sidebar-mini layout-fixed">
<div class="wrapper">
    @include('admin.main.header')

    @include('admin.main.sidebar')

    @yield('content')

    @include('admin.main.footer')
</div>

@include('admin.main.scripts')

@section('scripts')
@show

</body>
</html>
