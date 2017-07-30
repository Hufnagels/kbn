<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="mdc-typography">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Management</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
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



  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
