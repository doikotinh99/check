<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- jQuery -->
    <script src="{{ asset('font_admin/jquery/jquery.min.js') }}"></script>
    {{--ckeditor--}}
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('fontawesome-free/css/all.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('font_admin/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
<div class="wrapper">
    <header>
        @include("admin.blocks.admin_header")
        @include("admin.blocks.sidebar")
    </header>
    <main class="content-wrapper">
        <div class="content" id="cnt_admin">
            @yield("content")
        </div>
    </main>
    <footer class="main-footer">
{{--        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>--}}
{{--        All rights reserved.--}}
{{--        <div class="float-right d-none d-sm-inline-block">--}}
{{--            <b>Version</b> 3.1.0--}}
{{--        </div>--}}
    </footer>
</div>

<!-- REQUIRED SCRIPTS -->


<!-- Bootstrap -->
<script src="{{ asset('font_admin/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ asset('font_admin/js/adminlte.js') }}"></script>

{{--script--}}
<script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
