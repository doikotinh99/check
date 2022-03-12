<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.2.1.min.js')}}" defer></script>
    <script src="{{ asset('js/popper.js')}}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('js/isotope.pkgd.min.js')}}" defer></script>
    <script src="{{ asset('OwlCarousel2-2.3.4/dist/owl.carousel.min.js')}}" defer></script>
    <script src="{{ asset('js/easing.js')}}" defer></script>
    <script src="{{ asset('js/custom.js')}}" defer></script>
    <script src="{{ asset('js/myapp.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
    <link href="{{ asset('css/admin/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('OwlCarousel2-2.3.4/dist/assets/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('OwlCarousel2-2.3.4/dist/assets/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/home_style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/home_responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/myapp.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>
    <div id="super_container">
        <header class="header trans_300">
            @include('blocks.header_user')
        </header>
        @include('blocks.m_header_user')
        <div class="fs_menu_overlay"></div>
        <main class="main_mt">
            @yield('content')
        </main>

        <footer>
            @include('blocks.footer')
        </footer>
    </div>
</body>
</html>
