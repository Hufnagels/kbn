<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="mdc-typography">
<head>
  @include('_includes.head.meta')

  <title>{{ config('app.name', 'Laravel') }} - Manage @yield('title')</title>

  @include('_includes.head.appstyles')
  @include('_includes.head.managestyles')

  @yield('styles')

  @include('_includes.head.managescripts')

</head>

<body class="m-b-5">

  @include('_includes.nav.navbar')

  <div class="columns manage">

    @if( Auth::user()->hasRole(['teacher','student','gamevisitor']))
      <div class="column m-r-10 m-l-20 m-b-10">
        <div id="app">
          @yield('content')
        </div>
      </div>
    @endif

    @if( Auth::user()->hasRole(['admin', 'editor', 'author']))
      <div class="column is-one-quarter">
          @include('_includes.nav.sidebar')
      </div>
      <div class="column is-three-quarters">
        <div id="app">
          @yield('content')
        </div>
      </div>
    @endif

  </div>

  @yield('scripts')

</body>
</html>
