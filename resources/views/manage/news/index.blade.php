@extends('layouts.manage')
@section('title',' - News list')
@section('content')

  <div class="columns">
    <div class="column">
      <div class="card">
        <div class="card-header notification is-primary">
          <div class="column"><div class="title">Manage News posts</div></div>
          <div class="column"><a href="{{ route('post.create')}}" class="button is-primary is-inverted is-outlined is-pulled-right"><i class="fa fa-plus m-r-10"></i> Create news post</a></div>
        </div>
        <div class="card-content p-t-0">

          <p class="has-text-right m-b-10">{{ $newsCount}} News {{str_plural('Item',$newsCount)}}</p>
          <div class="tabs is-small is-right">
            <ul>
              <li {{ (app('request')->input('status') == 'own' ? 'class=is-active' : '') }}><a href="?status=own">Own news</a></li>
              <li {{ ( ((app('request')->input('status') == 'all') || (app('request')->input('status') == '')) ? 'class=is-active' : '') }}><a href="?status=all">All news</a></li>
              <li {{ (app('request')->input('status') == 'published' ? 'class=is-active' : '') }}><a href="?status=published">Published news</a></li>
              <li {{ (app('request')->input('status') == 'scheduled' ? 'class=is-active' : '') }}><a href="?status=scheduled">Scheduled news</a></li>
              <li {{ (app('request')->input('status') == 'draft' ? 'class=is-active' : '') }}><a href="?status=draft">Draft news</a></li>
              <li {{ (app('request')->input('status') == 'trash' ? 'class=is-active' : '') }}><a href="?status=trash">News in Trash</a></li>
            </ul>
          </div>
          @include('manage.news.message')
          @if ( ! $newsCount)
          <div class="notification is-warning"><strong>Currently no news found</strong></div>
          @else
            @if($onlyTrashed)
              @include('manage.news.table-trashednews')
            @else
              @include('manage.news.table-allnews')
            @endif
          {{$newses->appends(Request::query())->render() }}
          @endif
        </div>
      </div>

    </div>
  </div>

@endsection
