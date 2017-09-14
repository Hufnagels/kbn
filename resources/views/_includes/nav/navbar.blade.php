<nav class="navbar has-shadow">
  <div class="navbar-brand">
    <button class="navbar-item" href="{{ route('home')}}">
      <img src="{{ asset('/images/logo_kv_004.png') }}" alt="" class="is-hidden-touch">
      <img src="{{ asset('/images/logo_kv_003.png') }}" alt="" class="is-hidden-desktop is-hidden-print">
    </button>

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
      <a class="navbar-item " href="{{ route('welcome') }}">{{ __('navbar.home') }}</a>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link " href="{{ route('newses') }}">{{ __('navbar.news') }}</a>
        <div id="blogDropdown" class="navbar-dropdown " data-style="width: 18rem;">
          @foreach ($popularposts as $post)
            <a class="navbar-item" href="{{ route('news.show', $post->slug)}}">
              <div class="navbar-content">
                <p>
                  <small class="has-text-info">{{$post->date}}</small> |
                  <small class="has-text-info">{{$post->author->name}}</small>
                </p>
                <p>{{$post->title}}</p>
              </div>
            </a>
          @endforeach
          <hr class="navbar-divider">
          <a class="navbar-item " href="{{ route('newses') }}">{{ __('navbar.morenews') }}</a>
        </div>
      </div>
      <a class="navbar-item" href="{{ route('projects') }}">{{ __('navbar.projects') }}</a>
      <a class="navbar-item " href="{{ route('team') }}">{{ __('navbar.team') }}</a>
      <a class="navbar-item " href="{{ route('about') }}">{{ __('navbar.about') }}</a>
      <a class="navbar-item " href="{{ route('contact') }}">{{ __('navbar.contact') }}</a>
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
          <a class="navbar-item" href="{{ route('manage.dashboard')}}">{{ __('navbar.administration') }}</a>
          @if (check_user_permissions(request(), "Users@index"))

          @endif
          @if (Auth::user()->hasPermission('edit-profile'))
          <a class="navbar-item" href="{{ route('manage.account-edit')}}">{{ __('navbar.profile') }}</a>
          @endif
          <hr class="navbar-divider">
          <a class="navbar-item" href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('auth.logout') }}</a>
          @include('_includes.forms.logout')
        </div>
      </div>
      @endif

    </div>
  </div>
</nav>
