<aside class="menu notification is-info">
  <p class="menu-label">General</p>
  <ul class="menu-list">
    <li><a href="{{ route('home')}}">Dashboard</a></li>
  </ul>

@if (Laratrust::can(['create-acl', 'create-user']) )
  <p class="menu-label">Administration</p>
  <ul class="menu-list">
    <li><a href="{{ route('users.index') }}">Users</a></li>
    <li><a href="{{route('roles.index')}}">Roles</a></li>
    <li><a href="{{route('permissions.index')}}">Permissions</a></li>
  </ul>
@endif

  <p class="menu-label">Manage content</p>
  <ul class="menu-list">
    <li><a href="{{ route('post.index') }}">News</a></li>
    <li><a>Events</a></li>
    <li><a>Categories</a></li>

  </ul>
</aside>
