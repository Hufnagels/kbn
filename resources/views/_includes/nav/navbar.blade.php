<nav class="navbar has-shadow">
  <div class="navbar-brand">
    <a class="navbar-item" href="{{ route('welcome')}}">
      <img src="{{ asset('/images/logo_kv_004.png') }}" alt="" class="is-hidden-touch">
      <img src="{{ asset('/images/logo_kv_003.png') }}" alt="" class="is-hidden-desktop is-hidden-print">
    </a>

    <a class="navbar-item is-hidden-desktop is-hidden-print" href="https://www.facebook.com/kodvetok/" target="_blank">
      <span class="icon" style="color: #333;">
        <i class="fa fa-facebook"></i>
      </span>
    </a>

    <a class="navbar-item is-hidden-desktop is-hidden-print" href="https://plus.google.com/110795425669750457029" target="_blank">
      <span class="icon" style="color: #55acee;">
        <i class="fa fa-google-plus"></i>
      </span>
    </a>

    <div class="navbar-burger burger is-hidden-print" data-target="navMenu">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div id="navMenu" class="navbar-menu is-hidden-print">
    <div class="navbar-start">
      <a class="navbar-item {{ ( strpos(Route::currentRouteName(), 'welcome') > -1) ? 'is-active has-text-primary' : '' }}" href="{{ route('welcome') }}">{{ __('navbar.home') }}</a>
      <a class="navbar-item game {{ ( strpos(Route::currentRouteName(), 'enigma') > -1) ? 'is-active has-text-danger' : '' }}" href="{{ route('enigma') }}">{{ __('navbar.game') }}</a>
      @if(count($navbarpopularpost))
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link {{ ( strpos(Route::currentRouteName(), 'news') > -1) ? 'is-active has-text-primary' : '' }}" href="{{ route('newses') }}">{{ __('navbar.news') }}</a>
        <div id="blogDropdown" class="navbar-dropdown " data-style="width: 18rem;">
          @foreach ($navbarpopularpost as $post)
            <a class="navbar-item" href="{{ route('news.show', $post->slug)}}">
              <div class="navbar-content">
                <p><small class="has-text-info">{{Carbon\Carbon::parse($post->published_at)->toFormattedDateString()}}</small></p>
                <p>{{$post->title}}</p>
              </div>
            </a>
          @endforeach
          <hr class="navbar-divider">
          <a class="navbar-item" href="{{ route('newses') }}">{{ __('navbar.morenews') }}</a>
        </div>
      </div>
      @else
      <a class="navbar-item {{ ( strpos(Route::currentRouteName(), 'newses') > -1) ? 'is-active has-text-primary' : '' }}" href="{{ route('newses') }}">{{ __('navbar.news') }}</a>
      @endif
      <!-- <a class="navbar-item {{ ( strpos(Route::currentRouteName(), 'projects') > -1) ? 'is-active has-text-primary' : '' }}" href="{{ route('projects') }}">{{ __('navbar.projects') }}</a> -->
      <a class="navbar-item {{ ( strpos(Route::currentRouteName(), 'team') > -1) ? 'is-active has-text-primary' : '' }}" href="{{ route('team') }}">{{ __('navbar.team') }}</a>
      <a class="navbar-item {{ ( strpos(Route::currentRouteName(), 'about') > -1) ? 'is-active has-text-primary' : '' }}" href="{{ route('about') }}">{{ __('navbar.about') }}</a>
      <a class="navbar-item {{ ( strpos(Route::currentRouteName(), 'contact') > -1) ? 'is-active has-text-primary' : '' }}" href="{{ route('contact') }}">{{ __('navbar.contact') }}</a>
    </div>

    <div class="navbar-end">
      @if (Auth::guest())
      <a class="navbar-item" href="{{ route('login') }}">{{ __('auth.login') }}</a>

      @else
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link " href="#">{{ Auth::user()->name }}</a>
        <div id="loginDropdown" class="navbar-dropdown " data-style="width: 18rem;">
          @if( (Auth::user()->avatar))
          <div class="navbar-item image">
            <div class="navbar-content">
              <div class="level is-mobile">
                <div class="level-center">
                  <div class="level-item">
                    <img src="http://kvn.dev/images/news/128x128.png" alt="" class="image is-128x128" style="">
                  </div>
                </div>

              </div>
            </div>
          </div>
          @endif

          @if (Auth::user()->hasRole(['admin','author','editor','gamevisitor']))
          <a class="navbar-item" href="{{ route('manage.dashboard')}}">{{ __('navbar.administration') }}</a>
          @endif
          @if (Auth::user()->hasRole(['admin','author','editor','gamevisitor']))
          <a class="navbar-item" href="{{ route('profile.show', Auth::user()->id )}}">{{ __('navbar.profile') }}</a>
          <hr class="navbar-divider">
          @endif

          <a class="navbar-item" href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('auth.logout') }}</a>
          @include('_includes.forms.logout')
        </div>
      </div>
      @endif

    </div>
  </div>
</nav>
