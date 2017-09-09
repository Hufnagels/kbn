<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="mdc-typography">
<head>
  @include('_includes.head.meta')

  <title>{{ config('app.name', 'Laravel') }} - Manage @yield('title')</title>
  <link rel="icon" href="fav.ico">

  @include('_includes.head.appstyles')
  @include('_includes.head.managestyles')

  @yield('styles')

  @include('_includes.head.managescripts')

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
