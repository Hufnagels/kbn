<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="mdc-typography">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
<!--
        <nav class="nav has-shadow">
          <div class="container">
            <div class="nav-left">
              <a class="nav-item" href="{{ route('home')}}">
                <img src="{{ asset('/images/logo_kv_004.png') }}" alt="">
              </a>
              <a href="#" class="nav-item is-tab is-hidden-mobile">Home</a>
              <a href="#" class="nav-item is-tab is-hidden-mobile">About us</a>
              <a href="#" class="nav-item is-tab is-hidden-mobile">Team</a>
              <a href="" class="nav-item is-tab is-hidden-mobile">Contact</a>
              <a href="" class="nav-item is-tab is-hidden-mobile">Events</a>
              <a href="" class="nav-item is-tab is-hidden-mobile">Blog</a>

            </div>
            <div class="nav-right" style="overflow:visible;">
              @if (!Auth::guest())
                <a href="{{ route('login') }}" class="nav-item is-tab">Sign In</a>
                <a href="{{ route('register') }}" class="nav-item is-tab">Sign up</a>
              @else
              <button class="dropdown is-aligned-right nav-item is-open is-tab">
                Hey Istvan <span class="icon"><i class="fa fa-caret-down"></i></span>
                <ul class="dropdown-menu">
                  <li><a href="#">Profile</a></li>
                  <li><a href="#">Settings</a></li>
                  <li><a href="#">Notification</a></li>
                  <li class="separator"></li>
                  <li><a href="#">Logout</a></li>
                </ul>
              </button>
              @endif
            </div>
          </div>
        </nav>
-->

        @include('layouts.navbar')
        @yield('content')

    </div>
@include('layouts.footer')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
