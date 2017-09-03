<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="KODVETOK">
    <meta name="keywords" content="KODVETOK, kodvetok, microbit, micro:bit, scratch, arduino, genuino ">
    <meta name="author" content="KODVETOK">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>

    <link rel="icon" href="fav.ico">
    <!-- Styles
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">

    @yield('styles')

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/manifest.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/vendor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</head>
<!--
        <link rel="index" title="Index" href="../genindex.html">
        <link rel="search" title="Search" href="../search.html">
        <link rel="top" title="Laratrust Docs 4.0.0 documentation" href="../index.html">
        <link rel="up" title="Usage" href="index.html">
        <link rel="next" title="Soft Deleting" href="soft_deleting.html">
        <link rel="prev" title="Usage" href="index.html">
    -->
