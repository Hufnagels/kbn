@include('_includes.head')
@include('_includes.nav.navbar')
    <div id="app">

        @yield('content')

    </div>
    @include('_includes.footer')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
