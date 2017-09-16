<aside class="menu notification is-info">
  @if (Auth::user()->hasRole(['admin', 'editor', 'author']))
  <p class="menu-label">{{ __('navbar.manage.general') }}</p>
  <ul class="menu-list">
    <!-- <li><a {{ ( strpos(Route::currentRouteName(), 'dashboard') > -1) ? 'class=is-active' : '' }} href="{{ route('home')}}">Dashboard</a></li>-->
    <li><a {{ ( strpos(Route::currentRouteName(), 'fm') > -1) ? 'class=is-active' : '' }} href="{{ route('fm.show') }}">Filemanager</a></li>
    @if (Auth::user()->hasRole('admin'))
    <li><a {{ ( strpos(Route::currentRouteName(), 'calendar') > -1) ? 'class=is-active' : '' }} href="{{ route('calendar.index') }}">Calendar</a></li>
    @endif
  </ul>
  @endif

  @if (Auth::user()->hasRole(['admin', 'editor']))
  <p class="menu-label">{{ __('navbar.manage.userAdmin') }}</p>
  <ul class="menu-list">
    @if (Auth::user()->hasPermission('crud-user'))
    <li><a {{ ( strpos(Route::currentRouteName(), 'users') > -1) ? 'class=is-active' : '' }} href="{{ route('users.index') }}">{{ __('navbar.manage.users') }}</a></li>
    @endif
    @if (Auth::user()->hasPermission('crud-role'))
    <li><a {{ ( strpos(Route::currentRouteName(), 'roles') > -1) ? 'class=is-active' : '' }} href="{{route('roles.index')}}">{{ __('navbar.manage.roles') }}</a></li>
    @endif
    @if (Auth::user()->hasPermission('crud-permission'))
    <li><a {{ ( strpos(Route::currentRouteName(), 'permissions') > -1) ? 'class=is-active' : '' }} href="{{route('permissions.index')}}">{{ __('navbar.manage.permissions') }}</a></li>
    @endif
  </ul>
  @endif

  @if (Auth::user()->hasRole(['admin', 'editor','author']))
  <p class="menu-label">{{ __('navbar.manage.manageContent') }}</p>
  <ul class="menu-list">
    @if (Auth::user()->hasPermission('crud-news'))
    <li><a {{ ( strpos(Route::currentRouteName(), 'post') > -1) ? 'class=is-active' : '' }} href="{{ route('post.index') }}">{{ __('navbar.news') }}</a></li>
    @endif
    @if (Auth::user()->hasPermission('crud-events'))
    <li><a {{ ( strpos(Route::currentRouteName(), 'event') > -1) ? 'class=is-active' : '' }} href="{{ route('event.index') }}">{{ __('navbar.events') }}</a></li>
    @endif
    @if (Auth::user()->hasPermission('crud-instruction'))
    <li><a {{ ( strpos(Route::currentRouteName(), 'instruction') > -1) ? 'class=is-active' : '' }} href="{{ route('instruction.index') }}">{{ __('navbar.instruction') }}</a></li>
    @endif
    @if (Auth::user()->hasPermission('crud-lession'))
    <li><a {{ ( strpos(Route::currentRouteName(), 'lession') > -1) ? 'class=is-active' : '' }} href="{{ route('lession.index') }}">{{ __('navbar.lession') }}</a></li>
    @endif

    @if (Auth::user()->hasPermission('crud-category'))
    <li class="navbar-divider" style="width:50%"></li>
    <li><a {{ ( strpos(Route::currentRouteName(), 'category') > -1) ? 'class=is-active' : '' }} href="{{ route('category.index') }}">{{ __('navbar.manage.category') }}</a></li>
    @endif
    @if (Auth::user()->hasPermission('crud-tag'))
    <li><a {{ ( strpos(Route::currentRouteName(), 'tag') > -1) ? 'class=is-active' : '' }} href="{{ route('tag.index') }}">{{ __('navbar.manage.tag') }}</a></li>
    @endif
    <li class="navbar-divider" style="width:50%"></li>
    @if (Auth::user()->hasPermission('crud-media'))
    <li><a {{ ( strpos(Route::currentRouteName(), 'video') > -1) ? 'class=is-active' : '' }} href="{{ route('video.index') }}">{{ __('navbar.manage.video') }}</a></li>
    <li><a {{ ( strpos(Route::currentRouteName(), 'photo') > -1) ? 'class=is-active' : '' }} href="{{ route('photo.index') }}">{{ __('navbar.manage.galery') }}</a></li>
    @endif

  @endif
  </ul>

  @if (Auth::user()->hasRole(['admin', 'editor', 'author']))
  <p class="menu-label">{{ __('navbar.manage.indexPageElements') }}</p>
  <ul class="menu-list">
    <li><a {{ ( strpos(Route::currentRouteName(), 'testimonial') > -1) ? 'class=is-active' : '' }} href="{{ route('testimonial.index') }}">{{ __('manageTesti.testimonials') }}</a></li>

  </ul>
  @endif

</aside>
