<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="mdc-typography">
@include('_includes.head')
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
