<aside class="menu notification is-info">
  <p class="menu-label">General</p>
  <ul class="menu-list">
    <li><a {{ ( strpos(Route::currentRouteName(), 'dashboard') > -1) ? 'class=is-active' : '' }} href="{{ route('home')}}">Dashboard</a></li>
  </ul>

@if (check_user_permissions(request(), "Users@index"))
  <p class="menu-label">Administration</p>
  <ul class="menu-list">
    <li><a {{ ( strpos(Route::currentRouteName(), 'users') > -1) ? 'class=is-active' : '' }} href="{{ route('users.index') }}">Users</a></li>
    <li><a {{ ( strpos(Route::currentRouteName(), 'roles') > -1) ? 'class=is-active' : '' }} href="{{route('roles.index')}}">Roles</a></li>
    <li><a {{ ( strpos(Route::currentRouteName(), 'permissions') > -1) ? 'class=is-active' : '' }} href="{{route('permissions.index')}}">Permissions</a></li>
  </ul>
@endif

  <p class="menu-label">Manage content</p>
  <ul class="menu-list">

    <li><a {{ ( strpos(Route::currentRouteName(), 'post') > -1) ? 'class=is-active' : '' }} href="{{ route('post.index') }}">News</a></li>

    @if (check_user_permissions(request(), "ManageCategories@index"))
    <li><a {{ ( strpos(Route::currentRouteName(), 'category') > -1) ? 'class=is-active' : '' }} href="{{ route('category.index') }}">Categories</a></li>
    @endif
    @if (check_user_permissions(request(), "ManageTag@index"))
    <li><a {{ ( strpos(Route::currentRouteName(), 'tag') > -1) ? 'class=is-active' : '' }} href="{{ route('tag.index') }}">Tags</a></li>
    @endif
  </ul>
</aside>
