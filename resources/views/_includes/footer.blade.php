
<a href="#" id="top" class="button is-primary is-hidden-print" ><i class="fa fa-angle-double-up "></i></a>
<footer class="footer m-t-0">
  <div class="container is-hidden-print">
    <div class="columns">
      <div class="column has-text-white-ter">
        <p class="is-size-3 is-uppercase is-paddingless is-marginless ">Kódvetők</p>
        <p class="is-size-6 is-lowercase">Digitális Oktatási Műhely</p>
        <p class="is-size-7 is-lowercase m-t-20">
          <figure class="image is-128x30">
            <a href="http://www.microbit.org/" target="_blank"><img class="img" src="/images/new-logo.svg"></a>
          </figure>
        </p>
      </div>

      <div class="column  has-text-white-ter">
        <p class="is-size-5 is-uppercase is-paddingless is-marginless footer-header">Linkek</p>
        <ul class="footer-navbar-list m-t-10">
          <li><a class="navbar-item " href="{{ route('welcome') }}">{{ __('navbar.home') }}</a></li>
          <li><a class="navbar-item " href="{{ route('newses') }}">{{ __('navbar.news') }}</a></li>
          <!-- <li><a class="navbar-item" href="{{ route('projects') }}">{{ __('navbar.projects') }}</a></li> -->
          <li><a class="navbar-item " href="{{ route('team') }}">{{ __('navbar.team') }}</a></li>
          <li><a class="navbar-item " href="{{ route('about') }}">{{ __('navbar.about') }}</a></li>
        </ul>

      </div>

      <div class="column  has-text-white-ter">
        <p class="is-size-5 is-uppercase is-paddingless  m-b-10 footer-header">{{ __('navbar.follow') }}</p>
        <p class="is-size-7 is-paddingless m-b-10">{{ __('navbar.followOnFacebook') }}</p>
        <p  class="is-size-7 is-paddingless m-t-10 footer_social"><a class="icon bg-facebook" href="https://www.facebook.com/kodvetok/" target="_blank"><i class="fa fa-facebook"></i></a></p>
      </div>

      <div class="column  has-text-white-ter">
        <p class="is-size-5 is-uppercase is-paddingless m-b-10 footer-header">{{ __('navbar.contact') }}</p>
        <p class="is-size-7 is-paddingless m-t-10 m-b-10">Email : info@kodvetok.com </p>
      </div>

      <div class="column  has-text-white-ter">
        <p class="is-size-5 is-uppercase is-paddingless is-marginless footer-header">Letölthető</p>
        <ul class="footer-navbar-list m-t-10">
          <li><a class="navbar-item " title="Jelentkez&eacute;si lap" href="/download?f=/jelentkezesek/jelentkezesi_lap.pdf" target="_blank" rel="noopener">Jelentkez&eacute;si lap</a></li>
          <li><a class="navbar-item " title="&Aacute;SZF" href="/download?f=/Jogi_anyagok/aszf_20171008.pdf" target="_blank" rel="noopener">&Aacute;SZF</a></li>
          <li><a class="navbar-item " title="Házirend" href="/download?f=/Jogi_anyagok/hazirend_20171008.pdf" target="_blank" rel="noopener">Házirend</a></li>
        </ul>
      </div>

      </div>
    </div>
    <div class="container has-text-centered has-text-white-ter is-hidden-nonprint">
      <p class="is-size-5 is-uppercase is-paddingless m-b-10 ">Kapcsolat</p>
      <p class="is-size-7 is-paddingless m-t-5 m-b-5">Email : info@kodvetok.com </p>
      <p class="is-size-7 is-paddingless m-t-5 m-b-5">https://www.facebook.com/kodvetok/</p>
    </div>
    <div class="container is-black">
      <div class="content has-text-centered has-text-grey-lighter">
        <p>©2016 - 2017 Kódvetők. All Rights Reserved</p>
      </div>
    </div>
  </div>
</footer>
