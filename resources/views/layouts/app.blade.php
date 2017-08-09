<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="mdc-typography">
@include('_includes.head')
<body>
@include('_includes.nav.navbar')

    <div id="app1">

        @yield('content')

    </div>
    @include('_includes.footer')

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')

</body>
</html>
