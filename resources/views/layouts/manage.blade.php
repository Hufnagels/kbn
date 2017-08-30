<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="mdc-typography">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Manage @yield('title')</title>

    <!-- Styles
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/manage.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/manifest.js') }}"></script>
    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/manage.js') }}"></script>
</head>
<body class="m-b-5">
  @include('_includes.nav.navbar')
  <div class="columns manage">
    <div class="column is-one-quarter">
        @include('_includes.nav.sidebar')
    </div>
    <div class="column is-three-quarters">
      <div id="app">

        @yield('content')

      </div>
    </div>
  </div>





  @yield('scripts')

</body>
</html>
