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
  <div id="modal" class="modal
  @if ( session('message'))
  is-active
  @endif
  ">
    <div class="modal-background"></div>
    <div class="modal-content">
      <div class="box">
        <article class="media">
          <div class="media-left">
            <figure class="image is-64x64">
              <i class="fa fa-frown-o" aria-hidden="true" style="font-size: 70px;color: cadetblue;"></i>
            </figure>
          </div>
          <div class="media-content">
            <div class="content">
              <p>
                <strong>{{ __('app.sorry') }}</strong><br>
                {{ __('app.fileNotFound') }}<br>
                <small>{{ __('app.reportEmail') }}</small>
              </p>
            </div>

          </div>
        </article>
      </div>
    </div>
    <button class="modal-close is-large" onclick="document.getElementById('modal').className = 'modal';"></button>
  </div>
@include('_includes.nav.navbar')
    <div id="app1">
        @yield('content')
        @yield('sidebar')
    </div>
    @include('_includes.footer')
    @yield('scripts')

    @include('cookieConsent::index')
</body>
</html>
