<aside class="menu notification is-info">
  <p class="menu-label">General</p>
  <ul class="menu-list">
    <li><a {{ ( strpos(Route::currentRouteName(), 'dashboard') > -1) ? 'class=is-active' : '' }} href="{{ route('home')}}">Dashboard</a></li>
  </ul>

  @if (Auth::user()->hasRole(['admin', 'editor']))
  <p class="menu-label">User administration</p>
  <ul class="menu-list">
    @if (Auth::user()->hasPermission('crud-user'))
    <li><a {{ ( strpos(Route::currentRouteName(), 'users') > -1) ? 'class=is-active' : '' }} href="{{ route('users.index') }}">Users</a></li>
    @endif
    @if (Auth::user()->hasPermission('crud-role'))
    <li><a {{ ( strpos(Route::currentRouteName(), 'roles') > -1) ? 'class=is-active' : '' }} href="{{route('roles.index')}}">Roles</a></li>
    @endif
    @if (Auth::user()->hasPermission('crud-permission'))
    <li><a {{ ( strpos(Route::currentRouteName(), 'permissions') > -1) ? 'class=is-active' : '' }} href="{{route('permissions.index')}}">Permissions</a></li>
    @endif
  </ul>
  @endif

  @if (Auth::user()->hasRole(['admin', 'editor','author']))
  <p class="menu-label">Manage content</p>
  <ul class="menu-list">
    @if (Auth::user()->hasPermission('crud-news'))
    <li><a {{ ( strpos(Route::currentRouteName(), 'post') > -1) ? 'class=is-active' : '' }} href="{{ route('post.index') }}">News</a></li>
    @endif
    @if (Auth::user()->hasPermission('crud-event'))
    <li><a {{ ( strpos(Route::currentRouteName(), 'event') > -1) ? 'class=is-active' : '' }} href="{{ route('event.index') }}">Events</a></li>
    @endif
    @if (Auth::user()->hasPermission('crud-instruction'))
    <li><a {{ ( strpos(Route::currentRouteName(), 'instruction') > -1) ? 'class=is-active' : '' }} href="{{ route('instruction.index') }}">Instructions</a></li>
    @endif
    @if (Auth::user()->hasPermission('crud-lession'))
    <li><a {{ ( strpos(Route::currentRouteName(), 'lession') > -1) ? 'class=is-active' : '' }} href="{{ route('lession.index') }}">Lessions</a></li>
    @endif
    <li class="navbar-divider" style="width:50%"></li>
    @if (Auth::user()->hasPermission('crud-category'))
    <li><a {{ ( strpos(Route::currentRouteName(), 'category') > -1) ? 'class=is-active' : '' }} href="{{ route('category.index') }}">Categories</a></li>
    @endif
    @if (Auth::user()->hasPermission('crud-tag'))
    <li><a {{ ( strpos(Route::currentRouteName(), 'tag') > -1) ? 'class=is-active' : '' }} href="{{ route('tag.index') }}">Tags</a></li>
    @endif
    <li class="navbar-divider" style="width:50%"></li>
    <li><a {{ ( strpos(Route::currentRouteName(), 'testimonial') > -1) ? 'class=is-active' : '' }} href="{{ route('testimonial.index') }}">Testimonial</a></li>
  @endif



    @if (Auth::user()->hasPermission('crud-media'))
    <li><a {{ ( strpos(Route::currentRouteName(), 'video') > -1) ? 'class=is-active' : '' }} href="{{ route('video.index') }}">Videos</a></li>
    <li><a {{ ( strpos(Route::currentRouteName(), 'photo') > -1) ? 'class=is-active' : '' }} href="{{ route('photo.index') }}">Image gallery</a></li>
    @endif

  </ul>

  @if (Auth::user()->hasRole(['admin', 'editor']))
  <p class="menu-label">Main site elements</p>
  <ul class="menu-list">
    <li><a {{ ( strpos(Route::currentRouteName(), 'fm') > -1) ? 'class=is-active' : '' }} href="{{ route('fm.show') }}">Filemanager</a></li>
    @if (Auth::user()->hasRole('admin'))
    <li><a {{ ( strpos(Route::currentRouteName(), 'calendar') > -1) ? 'class=is-active' : '' }} href="{{ route('calendar.index') }}">Calendar</a></li>
    @endif
  </ul>
  @endif
</aside>
