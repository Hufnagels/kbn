@extends('layouts.manage')
@section('title',' - Users list')
@section('content')

<div class="flex-container"></div>
  <div class="columns">
    <div class="column">
      <div class="card">
        <div class="card-header notification is-primary">
          <div class="column">
            <div class="title">Manage Users</div>
          </div>
          <div class="column">
            <a href="{{ route('users.create')}}" class="button is-primary is-inverted is-outlined is-pulled-right"><i class="fa fa-plus m-r-10"></i> Create new User</a>
          </div>
        </div>
        <div class="card-content p-t-0">

          <p class="has-text-right m-b-10">{{ $usersCount}} User {{str_plural('Item',$usersCount)}}</p>
<!---->
          <div class="tabs is-small is-right">
            <ul>
              <li {{ ( ((app('request')->input('status') == 'all') || (app('request')->input('status') == '')) ? 'class=is-active' : '') }}><a href="?status=all">All</a></li>
              <li {{ (app('request')->input('status') == 'trash' ? 'class=is-active' : '') }}><a href="?status=trash">in Trash</a></li>
            </ul>
          </div>

          @include('manage.partials.message')

          @if ( ! $usersCount)
            <div class="notification is-warning"><strong>Currently no user found</strong></div>
          @else
            @if($onlyTrashed)
              @include('manage.users.table-trashed')
            @else
              @include('manage.users.table-all')
            @endif


            {{$users->appends(Request::query())->render() }}
          @endif

        </div>
      </div>

    </div>
  </div>

@endsection
