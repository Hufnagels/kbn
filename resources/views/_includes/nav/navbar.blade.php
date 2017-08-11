<nav class="navbar has-shadow">
  <div class="navbar-brand">
    <button class="navbar-item" href="{{ route('home')}}">
      <img src="{{ asset('/images/logo_kv_004.png') }}" alt="">
    </button>

    <a class="navbar-item is-hidden-desktop" href="https://www.facebook.com/kodvetok/" target="_blank">
      <span class="icon" style="color: #333;">
        <i class="fa fa-facebook"></i>
      </span>
    </a>

    <a class="navbar-item is-hidden-desktop" href="https://plus.google.com/110795425669750457029" target="_blank">
      <span class="icon" style="color: #55acee;">
        <i class="fa fa-google-plus"></i>
      </span>
    </a>

    <div class="navbar-burger burger" data-target="navMenu">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div id="navMenu" class="navbar-menu">
    <div class="navbar-start">

      <a class="navbar-item " href="{{ route('welcome') }}">Home</a>
      <a class="navbar-item " href="{{ route('about') }}">About</a>
      <a class="navbar-item " href="{{ route('team') }}">Team</a>
      <a class="navbar-item " href="{{ route('contact') }}">Contact</a>
      <a class="navbar-item " href="{{ route('newses') }}">News</a>
      
    </div>

    <div class="navbar-end">
      @if (Auth::guest())
      <a class="navbar-item" href="{{ route('login') }}">SignIn</a>
      <a class="navbar-item" href="{{ route('register') }}">SignUp</a>
      @else
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link " href="#">Hello {{ Auth::user()->name }}</a>
        <div id="blogDropdown" class="navbar-dropdown " data-style="width: 18rem;">
          <a class="navbar-item" href="/2017/07/24/access-previous-bulma-versions/">
              <div class="navbar-content">
                <p><small class="has-text-info">24 Jul 2017</small></p>
                <p>Access previous Bulma versions</p>
              </div>
          </a>
          <a class="navbar-item" href="{{ route('manage.dashboard')}}">Administration</a>
          <a class="navbar-item" href="{{ route('users.show', Auth::user()->id)}}">Profile</a>
          <hr class="navbar-divider">
          <a class="navbar-item" href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
          @include('_includes.forms.logout')
        </div>
      </div>
      @endif

    </div>
  </div>
</nav>
