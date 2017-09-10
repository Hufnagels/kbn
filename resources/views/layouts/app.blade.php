<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="mdc-typography">
<head>
  @include('_includes.head.meta')

  <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>
  

  @include('_includes.head.appstyles')

  @yield('styles')

  @include('_includes.head.appscripts')


</head>

<body >

@include('_includes.nav.navbar')
    <div id="app1">
        @yield('content')
        @yield('sidebar')
    </div>
    @include('_includes.footer')
    @yield('scripts')
</body>
</html>
