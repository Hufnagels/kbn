<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="mdc-typography">
<head>
  @include('_includes.head.meta')

  <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>
  <link rel="icon" href="/fav.ico">

  @include('_includes.head.appstyles')

  @yield('styles')

  @include('_includes.head.appscripts')


</head>

<body >

@include('_includes.nav.navbar')
    <div id="app1"></div>
        @yield('content')
        @yield('sidebar')

    @include('_includes.footer')
    @yield('scripts')
</body>
</html>
