<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type="image/svg+xml" href="/admin/img/logo.webp">
    <link rel="alternate icon" href="/admin/img/logo.webp">
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preload" as="font" type="font/woff2" href="/admin/fonts/400.woff2" crossorigin>
    <link rel="preload" as="font" type="font/woff2" href="/admin/fonts/300.woff2" crossorigin>
    <link rel="preload" as="font" type="font/woff2" href="/admin/fonts/600.woff2" crossorigin>
    <link rel="preload" as="font" type="font/woff2" href="/admin/fonts/700.woff2" crossorigin>

    <link rel="preload" as="style" href="{{ mix('/css/index.css', 'admin') }}" crossorigin>
    <link rel="stylesheet" href="{{ mix('/css/index.css', 'admin') }}" crossorigin>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @stack('css')
</head>
<body class="sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('admin.main.header')
        @include('admin.main.sidebar')
        {{ $slot }}
        @include('admin.main.footer')
    </div>

    @if($showIndexScripts)
        <script src="{{ mix('/js/index.js', 'admin') }}"></script>
    @endif

    <script src="{{ mix('/js/vendor.js', 'admin') }}"></script>

    <script src="/admin/plugins/tinymce/tinymce.min.js"></script>

    <script type="text/javascript">
        $('ul.nav-sidebar a.nav-link.active')
            .closest('ul.nav-treeview').css('display', 'block').closest('li.nav-item').addClass('menu-open').find('a.nav-link:first').addClass('active');
    </script>
    @stack('scripts')
</body>
</html>
